<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="76" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="16" secured="True" sourceType="Table" returnValueType="Number" defaultPageSize="20" name="employees" connection="registry_db" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:employees} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardAllowSorting="True" wizardSortingType="SimpleDir" wizardUsePageScroller="True" wizardAllowInsert="True" wizardAltRecord="False" wizardRecordSeparator="False" wizardAltRecordType="Controls" dataSource="employees, location, facilities, position, department" activeCollection="TableParameters" pasteActions="pasteActions" orderBy="FirstName">
			<Components>
				<Link id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="employees_Insert" hrefSource="employees_maint.ccp" removeParameters="EmployeeID; LoginID" wizardThemeItem="NavigatorLink" wizardDefaultValue="{res:CCS_InsertLink}" PathID="employeesemployees_Insert" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Sorter id="32" visible="True" name="Sorter_FirstName" column="FirstName" wizardCaption="{res:FirstName}" wizardSortingType="SimpleDir" wizardControl="FirstName" wizardAddNbsp="False" PathID="employeesSorter_FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="33" visible="True" name="Sorter_LastName" column="LastName" wizardCaption="{res:LastName}" wizardSortingType="SimpleDir" wizardControl="LastName" wizardAddNbsp="False" PathID="employeesSorter_LastName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="34" visible="True" name="Sorter_Position" column="PositionName" wizardCaption="{res:Position}" wizardSortingType="SimpleDir" wizardControl="Position" wizardAddNbsp="False" PathID="employeesSorter_Position">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="36" visible="True" name="Sorter_LocationID" column="FacilityName" wizardCaption="{res:LocationID}" wizardSortingType="SimpleDir" wizardControl="LocationID" wizardAddNbsp="False" PathID="employeesSorter_LocationID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="37" visible="True" name="Sorter_WorkPhone" column="WorkPhone" wizardCaption="{res:WorkPhone}" wizardSortingType="SimpleDir" wizardControl="WorkPhone" wizardAddNbsp="False" PathID="employeesSorter_WorkPhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="38" visible="True" name="Sorter_HandPhone" column="HandPhone" wizardCaption="{res:HandPhone}" wizardSortingType="SimpleDir" wizardControl="HandPhone" wizardAddNbsp="False" PathID="employeesSorter_HandPhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="39" visible="True" name="Sorter_Email" column="Email" wizardCaption="{res:Email}" wizardSortingType="SimpleDir" wizardControl="Email" wizardAddNbsp="False" PathID="employeesSorter_Email">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="47" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" fieldSource="FirstName" wizardCaption="{res:FirstName}" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardAddNbsp="True" PathID="employeesFirstName" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="employees_maint.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="102" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
						<LinkParameter id="103" sourceType="DataField" name="LoginID" source="LoginID"/>
					</LinkParameters>
				</Link>
				<Label id="49" fieldSourceType="DBColumn" dataType="Text" html="False" name="LastName" fieldSource="LastName" wizardCaption="{res:LastName}" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardAddNbsp="True" PathID="employeesLastName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="51" fieldSourceType="DBColumn" dataType="Text" html="False" name="Position" fieldSource="PositionName" wizardCaption="{res:Position}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardAddNbsp="True" PathID="employeesPosition">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="55" fieldSourceType="DBColumn" dataType="Text" html="False" name="LocationID" fieldSource="FacilityName" wizardCaption="{res:LocationID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardAddNbsp="True" wizardAlign="right" PathID="employeesLocationID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="57" fieldSourceType="DBColumn" dataType="Text" html="False" name="WorkPhone" fieldSource="WorkPhone" wizardCaption="{res:WorkPhone}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardAddNbsp="True" PathID="employeesWorkPhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="59" fieldSourceType="DBColumn" dataType="Text" html="False" name="HandPhone" fieldSource="HandPhone" wizardCaption="{res:HandPhone}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardAddNbsp="True" PathID="employeesHandPhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="61" fieldSourceType="DBColumn" dataType="Text" html="False" name="Email" fieldSource="Email" wizardCaption="{res:Email}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardAddNbsp="True" PathID="employeesEmail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="64" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardFirst="True" wizardPrev="True" wizardFirstText="|&lt;" wizardPrevText="&lt;&lt;" wizardNextText="&gt;&gt;" wizardLastText="&gt;|" wizardNext="True" wizardLast="True" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Hide-Show Component" actionCategory="General" id="65" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="98" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="ToExcelLink" PathID="employeesToExcelLink" hrefSource="employees_list.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="99" sourceType="Expression" format="yyyy-mm-dd" name="export" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Sorter id="107" visible="True" name="Sorter_DepartmentDsc" column="DepartmentDesc" wizardCaption="{res:LocationID}" wizardSortingType="SimpleDir" wizardControl="LocationID" wizardAddNbsp="False" PathID="employeesSorter_DepartmentDsc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="108" fieldSourceType="DBColumn" dataType="Text" html="False" name="DepartmentID" fieldSource="DepartmentDesc" wizardCaption="{res:LocationID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardAddNbsp="True" wizardAlign="right" PathID="employeesDepartmentID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="115" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="employeesImageLink1" hrefSource="employees_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="116" sourceType="DataField" name="LoginID" source="LoginID"/>
						<LinkParameter id="117" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="19" conditionType="Parameter" useIsNull="False" field="employees.EmployeeID" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" leftBrackets="0" rightBrackets="0" parameterSource="s_EmployeeID"/>
				<TableParameter id="22" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="4" leftBrackets="0" rightBrackets="0" parameterSource="s_FacilityID"/>
				<TableParameter id="23" conditionType="Parameter" useIsNull="False" field="employees.FirstName" parameterSource="s_FirstName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="24" conditionType="Parameter" useIsNull="False" field="employees.LastName" parameterSource="s_LastName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="25" conditionType="Parameter" useIsNull="False" field="employees.PositionID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="3" leftBrackets="0" rightBrackets="0" parameterSource="s_Position"/>
				<TableParameter id="114" conditionType="Parameter" useIsNull="False" field="department.DeptID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="department_DeptID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="17" tableName="employees" posWidth="115" posHeight="261" posLeft="10" posRight="-1" posTop="10"/>
				<JoinTable id="80" tableName="location" posLeft="223" posTop="156" posWidth="115" posHeight="180"/>
				<JoinTable id="82" tableName="facilities" posLeft="413" posTop="181" posWidth="95" posHeight="104"/>
				<JoinTable id="104" tableName="position" posLeft="456" posTop="27" posWidth="95" posHeight="88"/>
				<JoinTable id="109" tableName="department" posLeft="542" posTop="394" posWidth="108" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="100" tableLeft="employees" tableRight="location" fieldLeft="employees.LocationID" fieldRight="location.LocationID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="101" tableLeft="location" tableRight="facilities" fieldLeft="location.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="105" tableLeft="employees" tableRight="position" fieldLeft="employees.PositionID" fieldRight="position.PositionID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="110" tableLeft="location" tableRight="department" fieldLeft="location.DeptID" fieldRight="department.DeptID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="84" tableName="employees" fieldName="employees.*"/>
				<Field id="87" tableName="facilities" fieldName="FacilityName"/>
				<Field id="106" tableName="position" fieldName="position.*"/>
				<Field id="112" tableName="department" fieldName="DepartmentDesc"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups>
				<Group id="167" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="employeesSearch" returnPage="employees_list.ccp" wizardCaption="{res:CCS_SearchFormPrefix} {res:employees} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" PathID="employeesSearch" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="employeesSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FirstName" wizardCaption="{res:FirstName}" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" PathID="employeesSearchs_FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_LastName" wizardCaption="{res:LastName}" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" PathID="employeesSearchs_LastName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_Position" wizardCaption="{res:Position}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="employeesSearchs_Position" sourceType="Table" connection="registry_db" dataSource="position" boundColumn="PositionID" textColumn="PositionName">
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
				<ListBox id="10" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_FacilityID" wizardCaption="{res:LocationID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="employeesSearchs_FacilityID" connection="registry_db" dataSource="facilities" boundColumn="FacilityID" textColumn="FacilityName" orderBy="FacilityName">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="72" tableName="facilities" posLeft="146" posTop="10" posWidth="95" posHeight="120"/>
					</JoinTables>
					<JoinLinks>
					</JoinLinks>
					<Fields>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="department_DeptID" wizardCaption="{res:WorkPhone}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" PathID="employeesSearchdepartment_DeptID" sourceType="Table" connection="registry_db" dataSource="department" boundColumn="DeptID" textColumn="DepartmentDesc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="113" tableName="department" posLeft="10" posTop="10" posWidth="108" posHeight="88"/>
					</JoinTables>
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
		<Grid id="118" secured="True" sourceType="Table" returnValueType="Number" defaultPageSize="20" name="employees_admin" connection="registry_db" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:employees} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardAllowSorting="True" wizardSortingType="SimpleDir" wizardUsePageScroller="True" wizardAllowInsert="True" wizardAltRecord="False" wizardRecordSeparator="False" wizardAltRecordType="Controls" dataSource="employees, location, facilities, position, department, login" activeCollection="TableParameters" pasteActions="pasteActions" orderBy="FirstName">
			<Components>
				<Link id="119" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="employees_Insert" hrefSource="employees_maint.ccp" removeParameters="EmployeeID; LoginID" wizardThemeItem="NavigatorLink" wizardDefaultValue="{res:CCS_InsertLink}" PathID="employees_adminemployees_Insert" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Sorter id="120" visible="True" name="Sorter_FirstName" column="FirstName" wizardCaption="{res:FirstName}" wizardSortingType="SimpleDir" wizardControl="FirstName" wizardAddNbsp="False" PathID="employees_adminSorter_FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="121" visible="True" name="Sorter_LastName" column="LastName" wizardCaption="{res:LastName}" wizardSortingType="SimpleDir" wizardControl="LastName" wizardAddNbsp="False" PathID="employees_adminSorter_LastName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="122" visible="True" name="Sorter_Position" column="PositionName" wizardCaption="{res:Position}" wizardSortingType="SimpleDir" wizardControl="Position" wizardAddNbsp="False" PathID="employees_adminSorter_Position">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="123" visible="True" name="Sorter_LocationID" column="FacilityName" wizardCaption="{res:LocationID}" wizardSortingType="SimpleDir" wizardControl="LocationID" wizardAddNbsp="False" PathID="employees_adminSorter_LocationID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="124" visible="True" name="Sorter_WorkPhone" column="WorkPhone" wizardCaption="{res:WorkPhone}" wizardSortingType="SimpleDir" wizardControl="WorkPhone" wizardAddNbsp="False" PathID="employees_adminSorter_WorkPhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="125" visible="True" name="Sorter_HandPhone" column="HandPhone" wizardCaption="{res:HandPhone}" wizardSortingType="SimpleDir" wizardControl="HandPhone" wizardAddNbsp="False" PathID="employees_adminSorter_HandPhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="126" visible="True" name="Sorter_Email" column="Email" wizardCaption="{res:Email}" wizardSortingType="SimpleDir" wizardControl="Email" wizardAddNbsp="False" PathID="employees_adminSorter_Email">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="127" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" fieldSource="FirstName" wizardCaption="{res:FirstName}" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardAddNbsp="True" PathID="employees_adminFirstName" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="employees_maint.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="128" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
						<LinkParameter id="129" sourceType="DataField" name="LoginID" source="LoginID"/>
					</LinkParameters>
				</Link>
				<Label id="130" fieldSourceType="DBColumn" dataType="Text" html="False" name="LastName" fieldSource="LastName" wizardCaption="{res:LastName}" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardAddNbsp="True" PathID="employees_adminLastName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="131" fieldSourceType="DBColumn" dataType="Text" html="False" name="Position" fieldSource="PositionName" wizardCaption="{res:Position}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardAddNbsp="True" PathID="employees_adminPosition">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="132" fieldSourceType="DBColumn" dataType="Text" html="False" name="LocationID" fieldSource="FacilityName" wizardCaption="{res:LocationID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardAddNbsp="True" wizardAlign="right" PathID="employees_adminLocationID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="133" fieldSourceType="DBColumn" dataType="Text" html="False" name="WorkPhone" fieldSource="WorkPhone" wizardCaption="{res:WorkPhone}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardAddNbsp="True" PathID="employees_adminWorkPhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="134" fieldSourceType="DBColumn" dataType="Text" html="False" name="HandPhone" fieldSource="HandPhone" wizardCaption="{res:HandPhone}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardAddNbsp="True" PathID="employees_adminHandPhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="135" fieldSourceType="DBColumn" dataType="Text" html="False" name="Email" fieldSource="Email" wizardCaption="{res:Email}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardAddNbsp="True" PathID="employees_adminEmail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="136" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardFirst="True" wizardPrev="True" wizardFirstText="|&lt;" wizardPrevText="&lt;&lt;" wizardNextText="&gt;&gt;" wizardLastText="&gt;|" wizardNext="True" wizardLast="True" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Hide-Show Component" actionCategory="General" id="137" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="138" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="ToExcelLink" PathID="employees_adminToExcelLink" hrefSource="employees_list.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="139" sourceType="Expression" format="yyyy-mm-dd" name="export" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Sorter id="140" visible="True" name="Sorter_DepartmentDsc" column="DepartmentDesc" wizardCaption="{res:LocationID}" wizardSortingType="SimpleDir" wizardControl="LocationID" wizardAddNbsp="False" PathID="employees_adminSorter_DepartmentDsc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="141" fieldSourceType="DBColumn" dataType="Text" html="False" name="DepartmentID" fieldSource="DepartmentDesc" wizardCaption="{res:LocationID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardAddNbsp="True" wizardAlign="right" PathID="employees_adminDepartmentID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="142" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="employees_adminImageLink1" hrefSource="employees_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="143" sourceType="DataField" name="LoginID" source="LoginID"/>
						<LinkParameter id="144" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Link id="169" fieldSourceType="DBColumn" dataType="Text" html="False" name="login" PathID="employees_adminlogin" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" fieldSource="username" wizardUseTemplateBlock="False" hrefSource="employees_maint.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="175" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
						<LinkParameter id="176" sourceType="DataField" name="LoginID" source="LoginID"/>
					</LinkParameters>
				</Link>
				<Sorter id="170" visible="True" name="Sorter_login" column="FirstName" wizardCaption="{res:FirstName}" wizardSortingType="SimpleDir" wizardControl="FirstName" wizardAddNbsp="False" PathID="employees_adminSorter_login">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="145" conditionType="Parameter" useIsNull="False" field="employees.EmployeeID" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" leftBrackets="0" rightBrackets="0" parameterSource="s_EmployeeID"/>
				<TableParameter id="146" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="4" leftBrackets="0" rightBrackets="0" parameterSource="s_FacilityID"/>
				<TableParameter id="147" conditionType="Parameter" useIsNull="False" field="employees.FirstName" parameterSource="s_FirstName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="148" conditionType="Parameter" useIsNull="False" field="employees.LastName" parameterSource="s_LastName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="149" conditionType="Parameter" useIsNull="False" field="employees.PositionID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="3" leftBrackets="0" rightBrackets="0" parameterSource="s_Position"/>
				<TableParameter id="150" conditionType="Parameter" useIsNull="False" field="department.DeptID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="department_DeptID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="151" tableName="employees" posWidth="115" posHeight="261" posLeft="10" posRight="-1" posTop="10"/>
				<JoinTable id="152" tableName="location" posLeft="223" posTop="156" posWidth="115" posHeight="180"/>
				<JoinTable id="153" tableName="facilities" posLeft="413" posTop="181" posWidth="95" posHeight="104"/>
				<JoinTable id="154" tableName="position" posLeft="456" posTop="27" posWidth="95" posHeight="88"/>
				<JoinTable id="155" tableName="department" posLeft="542" posTop="394" posWidth="108" posHeight="88"/>
				<JoinTable id="171" tableName="login" posLeft="685" posTop="148" posWidth="115" posHeight="152"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="183" tableLeft="employees" tableRight="location" fieldLeft="employees.LocationID" fieldRight="location.LocationID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="184" tableLeft="location" tableRight="facilities" fieldLeft="location.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="185" tableLeft="employees" tableRight="position" fieldLeft="employees.PositionID" fieldRight="position.PositionID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="186" tableLeft="location" tableRight="department" fieldLeft="location.DeptID" fieldRight="department.DeptID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="187" tableLeft="employees" tableRight="login" fieldLeft="employees.LoginID" fieldRight="login.LoginID" joinType="right" conditionType="Equal"/>
</JoinLinks>
			<Fields>
				<Field id="160" tableName="employees" fieldName="employees.*"/>
				<Field id="161" tableName="facilities" fieldName="FacilityName"/>
				<Field id="162" tableName="position" fieldName="position.*"/>
				<Field id="163" tableName="department" fieldName="DepartmentDesc"/>
				<Field id="174" tableName="login" fieldName="username"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups>
				<Group id="168" groupID="1" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="employees_list_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="employees_list.php" forShow="True" url="employees_list.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="182" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="97"/>
			</Actions>
		</Event>
	</Events>
</Page>
