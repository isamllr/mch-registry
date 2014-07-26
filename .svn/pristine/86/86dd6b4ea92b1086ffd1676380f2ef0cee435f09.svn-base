<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\services" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="True" cachingEnabled="False" cachingDuration="1 minutes" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" connection="registry_db" dataSource="employees, position, facilities, location" activeCollection="TableParameters" name="employees_position_facili" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:employees_position_facili} {res:CCS_GridFormSuffix}">
<Components>
<Label id="589" fieldSourceType="DBColumn" dataType="Integer" html="False" name="EmployeeID" fieldSource="EmployeeID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="590" fieldSourceType="DBColumn" dataType="Text" html="False" name="Doctor" fieldSource="Doctor">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
</Components>
<Events/>
<TableParameters>
<TableParameter id="583" conditionType="Parameter" useIsNull="False" field="position.PositionID" dataType="Integer" searchConditionType="Equal" parameterType="Expression" logicOperator="And" parameterSource="&quot;1&quot;"/>
<TableParameter id="588" conditionType="Parameter" useIsNull="True" field="location.FacilityID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" parameterSource="keyword"/>
</TableParameters>
<JoinTables>
<JoinTable id="576" tableName="employees" posLeft="10" posTop="10" posWidth="115" posHeight="225"/>
<JoinTable id="577" tableName="position" posLeft="232" posTop="4" posWidth="95" posHeight="88"/>
<JoinTable id="578" tableName="facilities" posLeft="397" posTop="23" posWidth="95" posHeight="104"/>
<JoinTable id="579" tableName="location" posLeft="230" posTop="205" posWidth="95" posHeight="104"/>
</JoinTables>
<JoinLinks>
<JoinTable2 id="580" tableLeft="employees" tableRight="location" fieldLeft="employees.LocationID" fieldRight="location.LocationID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="581" tableLeft="location" tableRight="facilities" fieldLeft="location.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="582" tableLeft="position" tableRight="employees" fieldLeft="position.PositionID" fieldRight="employees.PositionID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
<Fields>
<Field id="584" fieldName="CONCAT(FirstName, &quot; &quot;, LastName, &quot; (&quot;,PositionName, &quot;)&quot; )" isExpression="True" alias="Doctor"/>
<Field id="585" tableName="employees" fieldName="EmployeeID"/>
</Fields>
<SPParameters/>
<SQLParameters/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="visit_maint_visit_EmployeeID_PTDependentListBox1.php" forShow="True" url="visit_maint_visit_EmployeeID_PTDependentListBox1.php" comment="//" codePage="utf-8"/>
</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
