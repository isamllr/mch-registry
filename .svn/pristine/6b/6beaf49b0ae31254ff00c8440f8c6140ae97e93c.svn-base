<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="10" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="78" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="30" connection="registry_db" dataSource="notification, notificationtext, notificationtype" name="notificationgrid" orderBy="notification.Day" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:Grid1} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" activeCollection="TableParameters">
			<Components>
				<Sorter id="81" visible="True" name="Sorter_NotificationID" column="NotificationID" wizardCaption="{res:NotificationID}" wizardSortingType="SimpleDir" wizardControl="NotificationID" wizardAddNbsp="False" PathID="notificationgridSorter_NotificationID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="83" visible="True" name="Sorter_Text" column="Text" wizardCaption="{res:Text}" wizardSortingType="SimpleDir" wizardControl="Text" wizardAddNbsp="False" PathID="notificationgridSorter_Text">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="NotificationID" fieldSource="TypeName" wizardCaption="{res:NotificationID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="notifications_edit_maint.ccp" wizardThemeItem="GridA" PathID="notificationgridNotificationID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="87" sourceType="DataField" format="yyyy-mm-dd" name="NotificationID" source="NotificationID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="91" fieldSourceType="DBColumn" dataType="Text" html="False" name="Text" fieldSource="Text" wizardCaption="{res:Text}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="notificationgridText">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="92" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="84" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="150" conditionType="Expression" useIsNull="False" field="notificationtext.LanguageCode" dataType="Text" searchConditionType="Equal" parameterType="Expression" logicOperator="And" expression="notificationtext.LanguageCode='UK'" parameterSource="LanguageCode"/>
				<TableParameter id="151" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="notification.NotificationTypeID&gt;1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="153" tableName="notification" posLeft="10" posTop="10" posWidth="119" posHeight="104"/>
				<JoinTable id="154" tableName="notificationtext" posLeft="150" posTop="10" posWidth="115" posHeight="120"/>
				<JoinTable id="156" tableName="notificationtype" posLeft="111" posTop="205" posWidth="119" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="155" tableLeft="notificationtext" tableRight="notification" fieldLeft="notificationtext.NotificationID" fieldRight="notification.NotificationID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="157" tableLeft="notification" tableRight="notificationtype" fieldLeft="notification.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="158" tableName="notification" fieldName="notification.*"/>
				<Field id="160" tableName="notificationtype" fieldName="TypeName"/>
				<Field id="161" tableName="notificationtext" fieldName="Text"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="93" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="notificationtextedit" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:notificationtext} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="notificationtextedit" activeCollection="ISQLParameters" parameterTypeListName="ParameterTypeList" dataSource="notificationtext, notification, notificationtype" customUpdateType="SQL" customUpdate="UPDATE notification n inner join notificationtext nt on n.NotificationID = nt.NotificationID
   set n.Day = null,
nt.Text = '{Text}'
  where nt.LanguageCode = 'UK' 
AND n.notificationID={NotificationID}" activeTableType="customUpdate" pasteActions="pasteActions" visible="Dynamic">
			<Components>
				<Button id="95" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="notificationtexteditButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextArea id="130" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Text" PathID="notificationtexteditText" required="True" fieldSource="Text">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Label id="168" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TypeName" PathID="notificationtexteditTypeName" fieldSource="TypeName" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="OnLoad" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="169"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="97" conditionType="Parameter" useIsNull="False" field="notificationtext.NotificationID" parameterSource="NotificationID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
				<TableParameter id="137" conditionType="Expression" useIsNull="True" field="notificationtext.LanguageCode" dataType="Text" searchConditionType="Equal" parameterType="Expression" logicOperator="And" expression="notificationtext.LanguageCode=&quot;UK&quot;"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="133" variable="NotificationID" dataType="Integer" parameterType="URL" parameterSource="NotificationID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="134" tableName="notificationtext" posLeft="10" posTop="10" posWidth="115" posHeight="120"/>
				<JoinTable id="135" tableName="notification" posLeft="146" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="163" tableName="notificationtype" posLeft="262" posTop="10" posWidth="119" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="136" tableLeft="notificationtext" tableRight="notification" fieldLeft="notificationtext.NotificationID" fieldRight="notification.NotificationID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="164" tableLeft="notification" tableRight="notificationtype" fieldLeft="notification.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="165" tableName="notificationtext" fieldName="notificationtext.*"/>
				<Field id="166" tableName="notification" fieldName="notification.*"/>
				<Field id="167" tableName="notificationtype" fieldName="TypeName"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="145" variable="Text" parameterType="Control" dataType="Text" parameterSource="Text"/>
				<SQLParameter id="146" variable="Day" parameterType="Control" defaultValue="1" dataType="Integer" parameterSource="Day"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="101" field="LanguageCode" dataType="Text" parameterType="Expression" parameterSource="UK" omitIfEmpty="False" defaultValue="UK"/>
				<CustomParameter id="102" field="Text" dataType="Text" parameterType="Control" parameterSource="Text" omitIfEmpty="True"/>
				<CustomParameter id="129" field="NType" dataType="Integer" parameterType="Expression" defaultValue="1" format="#,##0" omitIfEmpty="False" parameterSource="1"/>
				<CustomParameter id="139" field="Day" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Day"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="141" variable="NotificationID" parameterType="URL" dataType="Text" parameterSource="NotificationID"/>
				<SQLParameter id="143" variable="Text" parameterType="Control" dataType="Text" parameterSource="Text"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="106" conditionType="Parameter" useIsNull="True" field="NotificationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="NotificationID"/>
				<TableParameter id="108" conditionType="Expression" useIsNull="False" field="LanguageCode" dataType="Text" searchConditionType="Equal" parameterType="Expression" logicOperator="And" defaultValue="UK" expression="LanguageCode='UK'" parameterSource="UK"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="105" field="Text" dataType="Text" parameterType="Control" parameterSource="Text" omitIfEmpty="True"/>
				<CustomParameter id="140" field="Day" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Day"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="144" variable="NotificationID" parameterType="URL" dataType="Text" parameterSource="NotificationID"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="126" conditionType="Parameter" useIsNull="False" field="NotificationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="NotificationID"/>
				<TableParameter id="127" conditionType="Parameter" useIsNull="False" field="NotificationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="NotificationID"/>
				<TableParameter id="128" conditionType="Parameter" useIsNull="False" field="LanguageCode" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="LanguageCode"/>
			</DConditions>
			<SecurityGroups>
				<Group id="152" groupID="1" read="True" insert="True" update="True" delete="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="notifications_edit_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="notifications_edit_maint.php" forShow="True" url="notifications_edit_maint.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="9" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
