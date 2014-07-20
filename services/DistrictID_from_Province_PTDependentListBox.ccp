<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\services" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="True" cachingEnabled="False" cachingDuration="1 minutes" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" connection="registry_db" dataSource="districts, province" name="districts_province" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:districts_province} {res:CCS_GridFormSuffix}" orderBy="DistrictName">
			<Components>
				<Label id="153" fieldSourceType="DBColumn" dataType="Integer" html="False" name="DistrictID" fieldSource="DistrictID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="154" fieldSourceType="DBColumn" dataType="Text" html="False" name="DistrictName" fieldSource="DistrictName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="152" conditionType="Parameter" useIsNull="False" field="districts.ProvinceID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" parameterSource="keyword"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="148" tableName="districts" posLeft="289" posTop="73" posWidth="95" posHeight="104"/>
				<JoinTable id="149" tableName="province" posLeft="55" posTop="31" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="150" tableLeft="districts" tableRight="province" fieldLeft="districts.ProvinceID" fieldRight="province.ProvinceID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="DistrictID_from_Province_PTDependentListBox.php" forShow="True" url="DistrictID_from_Province_PTDependentListBox.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
