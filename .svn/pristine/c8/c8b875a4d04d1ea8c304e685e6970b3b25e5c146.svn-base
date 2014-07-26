<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\services" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="True" cachingEnabled="False" cachingDuration="1 minutes" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" connection="registry_db" dataSource="countries, province" name="countries_province" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:countries_province} {res:CCS_GridFormSuffix}" activeCollection="TableParameters" orderBy="ProvinceName">
			<Components>
				<Label id="147" fieldSourceType="DBColumn" dataType="Integer" html="False" name="ProvinceID" fieldSource="ProvinceID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="148" fieldSourceType="DBColumn" dataType="Text" html="False" name="ProvinceName" fieldSource="ProvinceName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="146" conditionType="Parameter" useIsNull="False" field="province.CountryID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" leftBrackets="0" rightBrackets="0" parameterSource="keyword"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="142" tableName="countries" posLeft="6" posTop="13" posWidth="95" posHeight="88"/>
				<JoinTable id="149" tableName="province" posLeft="122" posTop="10" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="150" tableLeft="province" tableRight="countries" fieldLeft="province.CountryID" fieldRight="countries.CountryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="152" fieldName="*"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="ProvinceID_from_Countries_PTDependentListBox.php" forShow="True" url="ProvinceID_from_Countries_PTDependentListBox.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
