<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\services" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="True" cachingEnabled="False" cachingDuration="1 minutes" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" connection="registry_db" dataSource="employees, position, facilities, location" name="employees_position_facili" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:employees_position_facili} {res:CCS_GridFormSuffix}" activeCollection="TableParameters">
<Components>
<Label id="471" fieldSourceType="DBColumn" dataType="Integer" html="False" name="EmployeeID" fieldSource="EmployeeID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="472" fieldSourceType="DBColumn" dataType="Text" html="False" name="Doctor" fieldSource="Doctor">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
</Components>
<Events/>
<TableParameters>
<TableParameter id="470" conditionType="Parameter" useIsNull="True" field="location.FacilityID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" parameterSource="keyword"/>
<TableParameter id="473" conditionType="Parameter" useIsNull="False" field="position.PositionID" dataType="Integer" searchConditionType="Equal" parameterType="Expression" logicOperator="And" parameterSource="&quot;1&quot;"/>
</TableParameters>
<JoinTables>
<JoinTable id="456" tableName="employees" posLeft="10" posTop="10" posWidth="115" posHeight="237"/>
<JoinTable id="457" tableName="position" posLeft="333" posTop="10" posWidth="95" posHeight="88"/>
<JoinTable id="458" tableName="facilities" posLeft="486" posTop="256" posWidth="95" posHeight="104"/>
<JoinTable id="459" tableName="location" posLeft="208" posTop="233" posWidth="95" posHeight="104"/>
</JoinTables>
<JoinLinks>
<JoinTable2 id="460" tableLeft="employees" tableRight="location" fieldLeft="employees.LocationID" fieldRight="location.LocationID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="461" tableLeft="location" tableRight="facilities" fieldLeft="location.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="462" tableLeft="position" tableRight="employees" fieldLeft="position.PositionID" fieldRight="employees.PositionID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
<Fields>
<Field id="464" fieldName="CONCAT(FirstName, &quot; &quot;, LastName, &quot; (&quot;,PositionName, &quot;)&quot; )" isExpression="True" alias="Doctor"/>
<Field id="465" tableName="employees" fieldName="EmployeeID"/>
<Field id="466" tableName="position" fieldName="position.*"/>
<Field id="467" tableName="facilities" fieldName="facilities.*"/>
<Field id="468" tableName="location" fieldName="location.*"/>
</Fields>
<SPParameters/>
<SQLParameters/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="delivery_maint_delivery_EmployeeID_PTDependentListBox1.php" forShow="True" url="delivery_maint_delivery_EmployeeID_PTDependentListBox1.php" comment="//" codePage="utf-8"/>
</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
