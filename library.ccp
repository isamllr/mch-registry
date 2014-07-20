<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Link id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="LinkUserManual" PathID="LinkUserManual" hrefSource="libdocs/UserManual_en.pdf" wizardUseTemplateBlock="False">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="7"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="LinkTermsOfUse" PathID="LinkTermsOfUse" wizardUseTemplateBlock="False" hrefSource="libdocs/TermsOfUse_en.pdf">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="9"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" wizardUseTemplateBlock="False" hrefSource="libdocs/pcform.pdf">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="library.php" forShow="True" url="library.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="library_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="3" groupID="1"/>
		<Group id="4" groupID="3"/>
		<Group id="5" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
