<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0" accessDeniedPage="noaccess.ccp">
	<Components>
		<Record id="3" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header" activeCollection="TableParameters">
			<Components>
				<Label id="4" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_headerPregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="5" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" PathID="pregnancy_headerFirstName" fieldSource="GivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="6" fieldSourceType="DBColumn" dataType="Text" html="False" name="FamiliyName" PathID="pregnancy_headerFamiliyName" fieldSource="FamilyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="7" fieldSourceType="DBColumn" dataType="Date" html="False" name="BirthDate" PathID="pregnancy_headerBirthDate" fieldSource="BirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="432" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_headerPatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_fac.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="252" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="9" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="10" tableName="patient" posLeft="108" posTop="16" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="188" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="19" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</UConditions>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="20" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="428" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="234" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="delivery" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:delivery} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="delivery" dataSource="delivery" pasteActions="pasteActions" returnPage="pregnancy_maint.ccp" customInsert="delivery" customInsertType="Table" customUpdate="delivery" customUpdateType="Table" activeCollection="UFormElements" activeTableType="delivery" customDelete="delivery" customDeleteType="Table" removeParameters="DeliveryID" pasteAsReplace="pasteAsReplace">
			<Components>
				<Button id="235" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="deliveryButton_Insert">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="237" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="deliveryButton_Update">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="392"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="238" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="deliveryButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="239" message="{res:CCS_DeleteConfirmation}" eventType="Client"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="393"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="8" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="deliveryButton_Cancel">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="394"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="240" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="HospitalAdmData" fieldSource="HospitalAdmData" required="True" caption="{res:HospitalAdmData}" wizardCaption="{res:HospitalAdmData}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliveryHospitalAdmData" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="241" name="DatePicker_HospitalAdmData" control="HospitalAdmData" wizardSatellite="True" wizardControl="HospitalAdmData" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="deliveryDatePicker_HospitalAdmData">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="FacilityID" fieldSource="FacilityID" required="True" caption="{res:FacilityID}" wizardCaption="{res:FacilityID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliveryFacilityID" sourceType="Table" connection="registry_db" dataSource="facilities" activeCollection="TableParameters" boundColumn="FacilityID" textColumn="FacilityName" orderBy="FacilityName">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="471"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
					<TableParameters>
						<TableParameter id="12" conditionType="Parameter" useIsNull="False" field="FacilityID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="FacilityID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="13" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<RadioButton id="242" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="PartnerDelivery" fieldSource="PartnerDelivery" required="True" caption="{res:PartnerDelivery}" wizardCaption="{res:PartnerDelivery}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliveryPartnerDelivery" sourceType="ListOfValues" html="True" connection="registry_db" dataSource="1;{res:RYes};0;{res:RNo};-1;{res:RNA}" boundColumn="PartnerDelivery" textColumn="PartnerDelivery" _valueOfList="0" _nameOfList="{res:RNo}" defaultValue="1">
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
				<RadioButton id="243" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Partogram" fieldSource="Partogram" required="True" caption="{res:Partogram}" wizardCaption="{res:Partogram}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliveryPartogram" sourceType="ListOfValues" html="True" connection="registry_db" _valueOfList="0" _nameOfList="{res:RNo}" dataSource="1;{res:RYes};0;{res:RNo};-1;{res:RNA}" defaultValue="1">
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
				<Hidden id="246" fieldSourceType="DBColumn" dataType="Integer" name="PregnancyID" PathID="deliveryPregnancyID" fieldSource="PregnancyID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CurrentUser" PathID="deliveryCurrentUser" fieldSource="by_user">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="23" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="24" fieldSourceType="DBColumn" dataType="Date" html="False" name="lastmodified" PathID="deliverylastmodified" fieldSource="created" format="GeneralDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="user" PathID="deliveryuser" fieldSource="by_user" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ListBox id="30" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="EmployeeID" fieldSource="EmployeeID" required="True" wizardCaption="{res:EmployeeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="deliveryEmployeeID" connection="registry_db" dataSource="employees, position" boundColumn="EmployeeID" textColumn="FirstAndLastNameAndPosition" activeCollection="TableParameters" orderBy="FirstName, LastName" caption="{res:Doctor}" features="(assigned)">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="31" conditionType="Expression" useIsNull="False" field="employees.PositionID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="employees.PositionID = 1" parameterSource="employees_PositionID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="32" tableName="employees" posLeft="10" posTop="10" posWidth="115" posHeight="260"/>
						<JoinTable id="33" tableName="position" posLeft="146" posTop="10" posWidth="95" posHeight="88"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="34" tableLeft="employees" tableRight="position" fieldLeft="employees.PositionID" fieldRight="position.PositionID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="35" fieldName="CONCAT(FirstName, &quot; &quot;, LastName, &quot; (&quot;,PositionName, &quot;)&quot; )" isExpression="True" alias="FirstAndLastNameAndPosition"/>
						<Field id="36" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features>
						<PTDependentListBox id="469" enabled="True" name="PTDependentListBox1" servicePage="services/delivery_maint_delivery_EmployeeID_PTDependentListBox1.ccp" masterListbox="FacilityID" category="Prototype">
							<Components/>
							<Events/>
							<Features/>
						</PTDependentListBox>
					</Features>
				</ListBox>
				<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="DataDelivery" fieldSource="DataDelivery" required="True" caption="{res:DataDelivery}" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliveryDataDelivery" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="41" name="DatePicker_DataDelivery1" control="DataDelivery" wizardSatellite="True" wizardControl="DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="deliveryDatePicker_DataDelivery1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="59" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="ListofProcedures" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="deliveryListofProcedures" connection="registry_db" boundColumn="ProcedureTypeID" textColumn="ProceudreIDName" activeCollection="TableParameters" dataSource="proceduretype">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="60" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="61" tableName="proceduretype" posLeft="10" posTop="10" posWidth="176" posHeight="105"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="62" fieldName="CONCAT(ProcedureTypeID, &quot; - &quot;, ProcedureName)" isExpression="True" alias="ProceudreIDName"/>
						<Field id="63" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Button id="64" urlType="Relative" enableValidation="False" isDefault="False" name="RightButton_procedure">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="65" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="66" urlType="Relative" enableValidation="False" isDefault="False" name="LeftButton_procedure">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="67" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="68" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="SelectedProcedures" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="deliverySelectedProcedures" connection="registry_db" textColumn="ProcedureIDName" activeCollection="TableParameters" dataSource="procedures, proceduretype" boundColumn="ProcedureTypeID">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="400"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="69" conditionType="Parameter" useIsNull="False" field="procedures.DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="DeliveryID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="70" tableName="procedures" posLeft="10" posTop="10" posWidth="112" posHeight="104"/>
						<JoinTable id="71" tableName="proceduretype" posLeft="180" posTop="24" posWidth="153" posHeight="88"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="72" tableLeft="procedures" tableRight="proceduretype" fieldLeft="procedures.ProcedureTypeID" fieldRight="proceduretype.ProcedureTypeID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="73" fieldName="CONCAT(procedures.ProcedureTypeID, &quot; - &quot;, proceduretype.ProcedureName)" isExpression="True" alias="ProcedureIDName"/>
						<Field id="254" tableName="procedures" fieldName="procedures.*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Hidden id="248" fieldSourceType="DBColumn" dataType="Text" name="LinkedID_Comp" PathID="deliveryLinkedID_Comp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="114" fieldSourceType="DBColumn" dataType="Text" name="LinkedID_Procedures" PathID="deliveryLinkedID_Procedures">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<ListBox id="256" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Integer" returnValueType="Number" name="ListofAnesthesia" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="deliveryListofAnesthesia" connection="registry_db" boundColumn="AnesthesiaTypeID" textColumn="AnesthesiaName" activeCollection="TableParameters" dataSource="anesthesiatype">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="257" eventType="Server" id_oncopy="257"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="257" tableName="anesthesiatype" posLeft="10" posTop="10" posWidth="118" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="258" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="262" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Integer" returnValueType="Number" name="SelectedAnesthesia" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="deliverySelectedAnesthesia" connection="registry_db" boundColumn="AnesthesiaTypeID" textColumn="AnesthesiaName" activeCollection="TableParameters" dataSource="anesthesia, anesthesiatype">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="397"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="260" conditionType="Parameter" useIsNull="False" field="anesthesia.DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="DeliveryID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="261" tableName="anesthesia" posLeft="10" posTop="10" posWidth="118" posHeight="104"/>
						<JoinTable id="262" tableName="anesthesiatype" posLeft="149" posTop="10" posWidth="118" posHeight="88"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="263" tableLeft="anesthesia" tableRight="anesthesiatype" fieldLeft="anesthesia.AnesthesiaTypeID" fieldRight="anesthesiatype.AnesthesiaTypeID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="264" tableName="anesthesia" fieldName="anesthesia.*"/>
						<Field id="265" tableName="anesthesiatype" fieldName="AnesthesiaName"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Button id="269" urlType="Relative" enableValidation="False" isDefault="False" name="RightButtonAnesthesia">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="270" eventType="Client" id_oncopy="270"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="273" urlType="Relative" enableValidation="False" isDefault="False" name="LeftButtonAnesthesia">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="274" eventType="Client" id_oncopy="274"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="282" fieldSourceType="DBColumn" dataType="Text" name="LinkedID_Anesthesia" PathID="deliveryLinkedID_Anesthesia">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<RadioButton id="283" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="AmnioticBursting" fieldSource="AmnioticBurstingID" required="True" caption="{res:AmnioticBursting}" wizardCaption="{res:Partogram}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliveryAmnioticBursting" sourceType="Table" html="True" connection="registry_db" _valueOfList="0" _nameOfList="{res:RNo}" dataSource="amniotic_bursting" boundColumn="AmnioticBurstingID" textColumn="AmnioticBursting" defaultValue="1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="272" tableName="amniotic_bursting" posLeft="10" posTop="10" posWidth="124" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</RadioButton>
				<TextBox id="247" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="HospitalDischDate" fieldSource="HospitalDischDate" required="False" caption="{res:HospitalDischDate}" wizardCaption="{res:HospitalDischDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliveryHospitalDischDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="21" name="DatePicker_HospitalDischDate" control="HospitalDischDate" wizardSatellite="True" wizardControl="HospitalDischDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="deliveryDatePicker_HospitalDischDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Steroids" fieldSource="Steroids" required="False" caption="{res:Steroids}" wizardCaption="{res:HomePhone}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliverySteroids">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="323" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TextArea1" PathID="deliveryTextArea1" fieldSource="Indications">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<RadioButton id="324" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Antibiotics" fieldSource="Antibiotics" required="True" caption="{res:Antibiotics}" wizardCaption="{res:Partogram}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliveryAntibiotics" sourceType="ListOfValues" html="True" connection="registry_db" _valueOfList="0" _nameOfList="{res:RNo}" dataSource="1;{res:RYes};0;{res:RNo}" defaultValue="0">
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
				<RadioButton id="328" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="SteroidsYesNo" fieldSource="SteroidsYesNo" required="True" caption="{res:SteroidsYesNo}" wizardCaption="{res:Partogram}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliverySteroidsYesNo" sourceType="ListOfValues" html="True" connection="registry_db" _valueOfList="0" _nameOfList="{res:RNo}" dataSource="1;{res:RYes};0;{res:RNo}" defaultValue="0">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="331"/>
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
				<ListBox id="42" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="ListofComplications" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="deliveryListofComplications" connection="registry_db" dataSource="icd10_all" boundColumn="ICD10ID" textColumn="DiseaseIDName" orderBy="ICD10ID" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="43" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="44" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="ICD10_class = 'O'"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="45" tableName="icd10_all" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="46" fieldName="CONCAT(ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="47" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Button id="48" urlType="Relative" enableValidation="False" isDefault="False" name="RightButton_comp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="49" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="50" urlType="Relative" enableValidation="False" isDefault="False" name="LeftButton_comp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="51" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="52" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="SelectedComplications" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="deliverySelectedComplications" connection="registry_db" boundColumn="ICD10ID" textColumn="DiseaseIDName" dataSource="icd10_all, complications" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="398"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="53" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="DeliveryID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="54" tableName="icd10_all" posLeft="46" posTop="101" posWidth="95" posHeight="104"/>
						<JoinTable id="55" tableName="complications" posLeft="193" posTop="18" posWidth="175" posHeight="104"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="56" tableLeft="complications" tableRight="icd10_all" fieldLeft="complications.ICD10ID" fieldRight="icd10_all.ICD10ID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="57" fieldName="CONCAT(icd10_all.ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="334" tableName="complications" fieldName="complications.*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="335" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="ListofPComplications" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="deliveryListofPComplications" connection="registry_db" dataSource="icd10_all" boundColumn="ICD10ID" textColumn="DiseaseIDName" orderBy="ICD10ID" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="336" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="337" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="ICD10_class = 'O'"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="338" tableName="icd10_all" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="339" fieldName="CONCAT(ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="340" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Button id="341" urlType="Relative" enableValidation="False" isDefault="False" name="RightButton_pcomp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="342" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="343" urlType="Relative" enableValidation="False" isDefault="False" name="LeftButton_pcomp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="344" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="345" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="SelectedPComplications" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="deliverySelectedPComplications" connection="registry_db" boundColumn="ICD10ID" textColumn="DiseaseIDName" dataSource="icd10_all, pcomplications" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeExecuteSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="396" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="384" conditionType="Parameter" useIsNull="False" field="pcomplications.DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="DeliveryID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="347" tableName="icd10_all" posLeft="46" posTop="101" posWidth="95" posHeight="104"/>
						<JoinTable id="353" tableName="pcomplications" posLeft="389" posTop="10" posWidth="115" posHeight="104"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="356" tableLeft="pcomplications" tableRight="icd10_all" fieldLeft="pcomplications.ICD10ID" fieldRight="icd10_all.ICD10ID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="350" fieldName="CONCAT(icd10_all.ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="355" tableName="pcomplications" fieldName="pcomplications.*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Hidden id="352" fieldSourceType="DBColumn" dataType="Text" name="LinkedID_PComp" PathID="deliveryLinkedID_PComp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="395" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="GestationAge" PathID="deliveryGestationAge" fieldSource="GestationAge" validationRule="($this-&gt;GestationAge-&gt;GetValue() &gt; 0 &amp;&amp; $this-&gt;GestationAge-&gt;GetValue() &lt; 46)" validationText="{res:Gestational_Limit}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="152" urlType="Relative" enableValidation="True" isDefault="False" name="ButtonUpdateAddNewBorn" PathID="deliveryButtonUpdateAddNewBorn" returnPage="newborn_maint.ccp" operation="Update">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="153" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="154" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="399" fieldSourceType="DBColumn" dataType="Boolean" name="Reloaded" PathID="deliveryReloaded" defaultValue="false">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="403" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="NumberOfDelivery" PathID="deliveryNumberOfDelivery" fieldSource="NumberOfDelivery" required="True" caption="{res:NumberOfDelivery}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<RadioButton id="406" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="Uterotoics" PathID="deliveryUterotoics" connection="registry_db" dataSource="1;{res:RYes};0;{res:RNo}" fieldSource="Uterotoics" caption="{res:Uterotoics}" required="True" defaultValue="1">
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
				<RadioButton id="325" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="ART" fieldSource="ART" required="True" caption="{res:ART}" wizardCaption="{res:Partogram}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliveryART" sourceType="ListOfValues" html="True" connection="registry_db" _valueOfList="0" _nameOfList="{res:RNo}" dataSource="1;{res:RYes};0;{res:RNo}" defaultValue="0">
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
				<Label id="434" fieldSourceType="CodeExpression" dataType="Text" html="False" name="Mg_Label" PathID="deliveryMg_Label" fieldSource="{res:mg}" defaultValue="{res:mg}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ListBox id="436" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="PregnancyOutcome1ID" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="deliveryPregnancyOutcome1ID" fieldSource="PregnancyOutcome1ID" connection="registry_db" dataSource="pregnancy_outcome" boundColumn="PregnancyOutcomeID" textColumn="PregnancyOutcomeName" caption="{res:PregnancyOutcomeID}" required="True" activeCollection="TableParameters" defaultValue="1">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="472"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="437" tableName="pregnancy_outcome" posLeft="10" posTop="10" posWidth="160" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="438" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="PregnancyOutcome2ID" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="deliveryPregnancyOutcome2ID" fieldSource="PregnancyOutcome2ID" connection="registry_db" dataSource="pregnancy_outcome" boundColumn="PregnancyOutcomeID" textColumn="PregnancyOutcomeName" caption="{res:PregnancyOutcomeID}" required="True" activeCollection="TableParameters" validationRule="(($this-&gt; PregnancyOutcome1ID-&gt;GetValue() &lt; 3 and $this-&gt;PregnancyOutcome2ID-&gt;GetValue() &lt; 3) or ($this-&gt; PregnancyOutcome1ID-&gt;GetValue() &gt; 2 and $this-&gt;PregnancyOutcome2ID-&gt;GetValue() &lt;0))" validationText="{res:ErorOutcome2}">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="439" tableName="pregnancy_outcome" posLeft="10" posTop="10" posWidth="160" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="440" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="PregnancyOutcome3ID" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="deliveryPregnancyOutcome3ID" fieldSource="PregnancyOutcome3ID" connection="registry_db" dataSource="pregnancy_outcome" boundColumn="PregnancyOutcomeID" textColumn="PregnancyOutcomeName" caption="{res:PregnancyOutcomeID}" required="True" activeCollection="TableParameters" validationRule="(($this-&gt; PregnancyOutcome1ID-&gt;GetValue() &lt; 3 and $this-&gt;PregnancyOutcome3ID-&gt;GetValue() &lt; 3) or ($this-&gt; PregnancyOutcome1ID-&gt;GetValue() &gt; 2 and $this-&gt;PregnancyOutcome3ID-&gt;GetValue() &lt;0))" validationText="{res:ErrorOutcome3}">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="441" tableName="pregnancy_outcome" posLeft="10" posTop="10" posWidth="160" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextArea id="442" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PregnancyOutcome4ID" PathID="deliveryPregnancyOutcome4ID" fieldSource="PregnancyOutcome4ID" caption="{res:PregnancyOutcomeID}" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="447" fieldSourceType="DBColumn" dataType="Integer" name="NrChildren" PathID="deliveryNrChildren">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="448"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<ListBox id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DeliveryMethodID" fieldSource="DeliveryMethodID" required="True" caption="{res:DeliveryMethodID}" wizardCaption="{res:DeliveryMethodID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliveryDeliveryMethodID" sourceType="Table" connection="registry_db" dataSource="deliverymethod" activeCollection="TableParameters" boundColumn="DeliveryMethodID" textColumn="DeliveryMethodName" defaultValue="1" validationRule="(($this-&gt; PregnancyOutcome1ID-&gt;GetValue() &lt; 3 and $this-&gt;DeliveryMethodID-&gt;GetValue() &lt; 4) or ($this-&gt; PregnancyOutcome1ID-&gt;GetValue() &gt; 2 and $this-&gt;DeliveryMethodID-&gt;GetValue() &gt; 5))" validationText="{res:ErrorDeliveryMethod}">
					<Components/>
					<Events>
						<Event name="OnLoad" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="453"/>
							</Actions>
						</Event>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="454"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
					<TableParameters>
						<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="DeliveryMetodID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryMetodID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="29" tableName="deliverymethod" posLeft="10" posTop="10" posWidth="141" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<ListBox id="244" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DeliveryTypeID" fieldSource="DeliveryTypeID" required="True" caption="{res:DeliveryTypeID}" wizardCaption="{res:DeliveryTypeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="deliveryDeliveryTypeID" sourceType="Table" connection="registry_db" dataSource="deliverytype" activeCollection="TableParameters" boundColumn="DeliveryTypeID" textColumn="DeliveryTypeName" defaultValue="2" orderBy="DeliveryTypeID" validationRule="(($this-&gt; PregnancyOutcome1ID-&gt;GetValue() &lt; 3 and $this-&gt;DeliveryTypeID-&gt;GetValue() &lt; 4) or ($this-&gt; PregnancyOutcome1ID-&gt;GetValue() &gt; 2 and $this-&gt;DeliveryTypeID-&gt;GetValue() &gt; 5))" validationText="{res:ErrorDeliveryType}">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
					<TableParameters>
						<TableParameter id="245" conditionType="Parameter" useIsNull="False" field="DeliveryTypeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryTypeID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="18" tableName="deliverytype" posLeft="172" posTop="10" posWidth="101" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
			</Components>
			<Events>
				<Event name="BeforeDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="249" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="AfterInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="250" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="AfterUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="251" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="OnSubmit" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="253" eventType="Client" id_oncopy="253"/>
					</Actions>
				</Event>
				<Event name="OnLoad" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="332"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="77" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" parameterSource="DeliveryID" logicOperator="And" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="78" tableName="delivery" posLeft="10" posTop="10" posWidth="141" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="79" field="HospitalAdmData" dataType="Date" parameterType="Control" parameterSource="HospitalAdmData" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="80" field="HospitalDischDate" dataType="Date" parameterType="Control" parameterSource="HospitalDischDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="False" defaultValue="NULL"/>
				<CustomParameter id="81" field="FacilityID" dataType="Integer" parameterType="Control" parameterSource="FacilityID" omitIfEmpty="True"/>
				<CustomParameter id="82" field="EmployeeID" dataType="Integer" parameterType="Control" parameterSource="EmployeeID" omitIfEmpty="True"/>
				<CustomParameter id="83" field="PartnerDelivery" dataType="Integer" parameterType="Control" parameterSource="PartnerDelivery" omitIfEmpty="True"/>
				<CustomParameter id="84" field="Partogram" dataType="Integer" parameterType="Control" parameterSource="Partogram" omitIfEmpty="True"/>
				<CustomParameter id="85" field="DeliveryTypeID" dataType="Integer" parameterType="Control" parameterSource="DeliveryTypeID" omitIfEmpty="True"/>
				<CustomParameter id="86" field="DeliveryMethodID" dataType="Integer" parameterType="Control" parameterSource="DeliveryMethodID" omitIfEmpty="True"/>
				<CustomParameter id="87" field="PregnancyID" dataType="Integer" parameterType="Control" parameterSource="PregnancyID" omitIfEmpty="True"/>
				<CustomParameter id="88" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
				<CustomParameter id="90" field="DataDelivery" dataType="Date" parameterType="Control" omitIfEmpty="True" parameterSource="DataDelivery" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate"/>
				<CustomParameter id="283" field="AmnioticBurstingID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="AmnioticBursting"/>
				<CustomParameter id="285" field="Indications" dataType="Memo" parameterType="Control" omitIfEmpty="True" parameterSource="TextArea1"/>
				<CustomParameter id="286" field="GestationAge" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="GestationAge"/>
				<CustomParameter id="287" field="Steroids" dataType="Integer" parameterType="Control" omitIfEmpty="False" parameterSource="Steroids" defaultValue="0"/>
				<CustomParameter id="288" field="Antibiotics" dataType="Integer" parameterType="Control" omitIfEmpty="False" parameterSource="Antibiotics" defaultValue="0"/>
				<CustomParameter id="289" field="ART" dataType="Integer" parameterType="Control" omitIfEmpty="False" parameterSource="ART" defaultValue="0"/>
				<CustomParameter id="329" field="SteroidsYesNo" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="SteroidsYesNo"/>
				<CustomParameter id="404" field="NumberOfDelivery" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="NumberOfDelivery"/>
				<CustomParameter id="407" field="Uterotoics" dataType="Integer" parameterType="Control" defaultValue="0" omitIfEmpty="False" parameterSource="Uterotoics"/>
				<CustomParameter id="443" field="PregnancyOutcome1ID" dataType="Integer" parameterType="Control" parameterSource="PregnancyOutcome1ID" omitIfEmpty="True"/>
				<CustomParameter id="444" field="PregnancyOutcome2ID" dataType="Integer" parameterType="Control" parameterSource="PregnancyOutcome2ID" omitIfEmpty="True"/>
				<CustomParameter id="445" field="PregnancyOutcome3ID" dataType="Integer" parameterType="Control" parameterSource="PregnancyOutcome3ID" omitIfEmpty="True"/>
				<CustomParameter id="446" field="PregnancyOutcome4ID" dataType="Text" parameterType="Control" parameterSource="PregnancyOutcome4ID" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="91" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="92" field="HospitalAdmData" dataType="Date" parameterType="Control" parameterSource="HospitalAdmData" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="93" field="HospitalDischDate" dataType="Date" parameterType="Control" parameterSource="HospitalDischDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="False" defaultValue="NULL"/>
				<CustomParameter id="94" field="FacilityID" dataType="Integer" parameterType="Control" parameterSource="FacilityID" omitIfEmpty="True"/>
				<CustomParameter id="95" field="EmployeeID" dataType="Integer" parameterType="Control" parameterSource="EmployeeID" omitIfEmpty="True"/>
				<CustomParameter id="96" field="PartnerDelivery" dataType="Integer" parameterType="Control" parameterSource="PartnerDelivery" omitIfEmpty="True"/>
				<CustomParameter id="97" field="Partogram" dataType="Integer" parameterType="Control" parameterSource="Partogram" omitIfEmpty="True"/>
				<CustomParameter id="98" field="DeliveryTypeID" dataType="Integer" parameterType="Control" parameterSource="DeliveryTypeID" omitIfEmpty="True"/>
				<CustomParameter id="99" field="DeliveryMethodID" dataType="Integer" parameterType="Control" parameterSource="DeliveryMethodID" omitIfEmpty="True"/>
				<CustomParameter id="100" field="PregnancyID" dataType="Integer" parameterType="Control" parameterSource="PregnancyID" omitIfEmpty="True"/>
				<CustomParameter id="102" field="DataDelivery" dataType="Date" parameterType="Control" omitIfEmpty="True" parameterSource="DataDelivery" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate"/>
				<CustomParameter id="103" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
				<CustomParameter id="290" field="AmnioticBurstingID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="AmnioticBursting"/>
				<CustomParameter id="292" field="Indications" dataType="Memo" parameterType="Control" omitIfEmpty="True" parameterSource="TextArea1"/>
				<CustomParameter id="293" field="GestationAge" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="GestationAge"/>
				<CustomParameter id="294" field="Steroids" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Steroids"/>
				<CustomParameter id="295" field="Antibiotics" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Antibiotics"/>
				<CustomParameter id="296" field="ART" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="ART"/>
				<CustomParameter id="330" field="SteroidsYesNo" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="SteroidsYesNo"/>
				<CustomParameter id="405" field="NumberOfDelivery" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="NumberOfDelivery"/>
				<CustomParameter id="408" field="Uterotoics" dataType="Integer" parameterType="Control" defaultValue="0" omitIfEmpty="False" parameterSource="Uterotoics"/>
				<CustomParameter id="449" field="PregnancyOutcome1ID" dataType="Integer" parameterType="Control" parameterSource="PregnancyOutcome1ID" omitIfEmpty="True"/>
				<CustomParameter id="450" field="PregnancyOutcome2ID" dataType="Integer" parameterType="Control" parameterSource="PregnancyOutcome2ID" omitIfEmpty="True"/>
				<CustomParameter id="451" field="PregnancyOutcome3ID" dataType="Integer" parameterType="Control" parameterSource="PregnancyOutcome3ID" omitIfEmpty="True"/>
				<CustomParameter id="452" field="PregnancyOutcome4ID" dataType="Text" parameterType="Control" parameterSource="PregnancyOutcome4ID" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="104" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" orderNumber="1" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="429" groupID="1" read="True"/>
				<Group id="430" groupID="3" read="True" insert="True" update="True" delete="True"/>
				<Group id="431" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Grid id="357" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="registry_db" dataSource="newborn, pregnancy, delivery" name="newborn" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:newborn} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" activeCollection="TableParameters" orderBy="newborn.BirthDate desc">
			<Components>
				<Label id="373" fieldSourceType="DBColumn" dataType="Text" html="False" name="newborn_TotalRecords" wizardUseTemplateBlock="False" PathID="newbornnewborn_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="374" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="375" visible="True" name="Sorter_NewBornN" column="NewBornN" wizardCaption="{res:NewBornN}" wizardSortingType="SimpleDir" wizardControl="NewBornN" wizardAddNbsp="False" PathID="newbornSorter_NewBornN" columnReverse="BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="376" visible="True" name="Sorter_Sex" column="Sex" wizardCaption="{res:Sex}" wizardSortingType="SimpleDir" wizardControl="Sex" wizardAddNbsp="False" PathID="newbornSorter_Sex">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="377" visible="True" name="Sorter_BirthDateTime" column="BirthDateTime" wizardCaption="{res:BirthDateTime}" wizardSortingType="SimpleDir" wizardControl="BirthDateTime" wizardAddNbsp="False" PathID="newbornSorter_BirthDateTime">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="378" fieldSourceType="DBColumn" dataType="Text" html="False" name="NewBornN" fieldSource="NewBornN" wizardCaption="{res:NewBornN}" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="newbornNewBornN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="379" fieldSourceType="DBColumn" dataType="Integer" html="False" name="Sex" fieldSource="Sex" wizardCaption="{res:Sex}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="newbornSex">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="435"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="380" fieldSourceType="DBColumn" dataType="Date" html="False" name="BirthDateTime" fieldSource="BirthDate" wizardCaption="{res:BirthDateTime}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="newbornBirthDateTime" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="381" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<ImageLink id="382" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="newbornImageLink1" hrefSource="newborn_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="383" sourceType="DataField" format="yyyy-mm-dd" name="NewBornID" source="NewBornID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Label id="385" fieldSourceType="DBColumn" dataType="Date" html="False" name="BirthDateTime1" fieldSource="BirthTime" wizardCaption="{res:BirthDateTime}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="newbornBirthDateTime1" format="ShortTime" DBFormat="HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="391"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="386" conditionType="Parameter" useIsNull="False" field="newborn.DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="DeliveryID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="358" tableName="newborn" posLeft="10" posTop="10" posWidth="150" posHeight="180"/>
				<JoinTable id="387" tableName="pregnancy" posLeft="379" posTop="138" posWidth="159" posHeight="180"/>
				<JoinTable id="388" tableName="delivery" posLeft="173" posTop="146" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="389" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="390" tableLeft="delivery" tableRight="pregnancy" fieldLeft="delivery.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="372" fieldName="*"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="409" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header1" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header1" activeCollection="TableParameters">
			<Components>
				<Label id="410" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_header1PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="433" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_header1PatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_district.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="414" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="415" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="416" tableName="patient" posLeft="108" posTop="16" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="417" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="418" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</UConditions>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="419" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="426" groupID="1" read="True"/>
				<Group id="427" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="delivery_maint.php" forShow="True" url="delivery_maint.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="delivery_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="423" groupID="1"/>
		<Group id="424" groupID="3"/>
		<Group id="425" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
	</Events>
</Page>
