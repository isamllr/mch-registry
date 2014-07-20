<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\services" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="True" cachingEnabled="False" cachingDuration="1 minutes" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" connection="registry_db" dataSource="employees, facilities, location, position" activeCollection="TableParameters" name="employees_facilities_loca" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:employees_facilities_loca} {res:CCS_GridFormSuffix}">
<Components>
<Label id="358" fieldSourceType="DBColumn" dataType="Integer" html="False" name="EmployeeID" fieldSource="EmployeeID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="359" fieldSourceType="DBColumn" dataType="Text" html="False" name="Doctor" fieldSource="Doctor">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
</Components>
<Events/>
<TableParameters>
<TableParameter id="350" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="keyword"/>
<TableParameter id="354" conditionType="Parameter" useIsNull="False" field="employees.PositionID" dataType="Integer" searchConditionType="Equal" parameterType="Expression" logicOperator="And" parameterSource="&quot;1&quot;"/>
</TableParameters>
<JoinTables>
<JoinTable id="345" tableName="employees" posLeft="10" posTop="10" posWidth="198" posHeight="368"/>
<JoinTable id="346" tableName="facilities" posLeft="553" posTop="51" posWidth="95" posHeight="104"/>
<JoinTable id="347" tableName="location" posLeft="284" posTop="24" posWidth="95" posHeight="104"/>
<JoinTable id="352" tableName="position" posLeft="379" posTop="314" posWidth="95" posHeight="88"/>
</JoinTables>
<JoinLinks>
<JoinTable2 id="348" tableLeft="location" tableRight="facilities" fieldLeft="location.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="349" tableLeft="employees" tableRight="location" fieldLeft="employees.LocationID" fieldRight="location.LocationID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="353" tableLeft="employees" tableRight="position" fieldLeft="employees.PositionID" fieldRight="position.PositionID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
<Fields>
<Field id="351" fieldName="CONCAT(FirstName,&quot; &quot;,LastName,&quot; (&quot;, PositionName,&quot;)&quot;)" isExpression="True" alias="Doctor"/>
<Field id="355" tableName="employees" fieldName="EmployeeID"/>
</Fields>
<SPParameters/>
<SQLParameters/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="pregnancy_maint_pregnancy_EmployeeID_PTDependentListBox1.php" forShow="True" url="pregnancy_maint_pregnancy_EmployeeID_PTDependentListBox1.php" comment="//" codePage="utf-8"/>
</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
