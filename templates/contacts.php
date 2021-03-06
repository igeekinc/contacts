<div id="app">
	<div id="app-navigation" class="loading">
		<ul id="grouplist">
			<li class="special">
				<a role="button" class="add-contact">
					<?php p($l->t('New Contact')); ?>
				</a>
			</li>
			<li class="special">
				<input class="add-group hidden" type="text" tabindex="0" autofocus placeholder="<?php p($l->t('Group name')); ?>" title="<?php p($l->t('New Group')); ?>" />
			</li>
		</ul>
		<div id="app-settings">
			<div id="app-settings-header">
				<button class="settings-button" tabindex="0"></button>
			</div>
			<div id="app-settings-content">
				<div id="addressbooks">
				<h2 data-id="addressbooks" tabindex="0" role="button"><?php p($l->t('Address books')); ?></h2>
					<ul class="addressbooklist">
					</ul>
					<input type="text" tabindex="0" autofocus id="add-address-book" placeholder="<?php p($l->t('Display name')); ?>" title="<?php p($l->t('Add Address Book')); ?>" />
				</div>
				<div id="import">
				<h2 data-id="import" tabindex="0" role="button"><?php p($l->t('Import')); ?></h2>
					<ul>
						<li class="import-upload">
							<select id="import_into">
								<option value="-1"><?php p($l->t('Import into...')); ?></option>
							</select>
							<button class="svg tooltipped rightwards import-upload-button" title="<?php p($l->t('Select file...')); ?>"></button>
							<input id="import_upload_start" class="tooltipped rightwards" title="<?php p($l->t('Select file...')); ?>" type="file" accept="text/vcard,text/x-vcard,text/directory" name="file" disabled />
						</li>
						<li class="import-status">
							<label id="import-status-text"></label>
							<div id="import-status-progress"></div>
						</li>
					</ul>
				</div>
			</div> <!-- app-settings-content -->
		</div>
	</div>
	<div id="app-content" class="loading">
		<!-- div id="contactsHeader">
			<input type="checkbox" class="toggle" title="<?php p($l->t('(De-)select all')); ?>" />
			<select class="action sort permanent" name="sort" title="<?php p($l->t('Sort order')); ?>">
				<option value="fn"><?php p($l->t('Display name')); ?></option>
				<option value="fl"><?php p($l->t('First- Lastname')); ?></option>
				<option value="lf"><?php p($l->t('Last-, Firstname')); ?></option>
			</select>
			<span class="actions">
				<select class="groups svg action text permanent" name="groups">
					<option value="-1" disabled="disabled" selected="selected"><?php p($l->t('Groups')); ?></option>
				</select>
				<a class="favorite action svg inactive control permanent" title="<?php p($l->t('Favorite')); ?>"></a>
				<a class="action merge"><?php p($l->t('Merge selected')); ?></a>
				<a class="download svg action text permanent"><?php p($l->t('Download')); ?></a>
				<a class="delete action permanent" title="<?php p($l->t('Delete')); ?>"></a>
			</span>
		</div -->
		<table id="contactlist">
			<thead>
				<tr id="contactsHeader">
					<td class="name">
						<input type="checkbox" class="toggle" title="<?php p($l->t('(De-)select all')); ?>" />
						<select class="action sort permanent" name="sort" title="<?php p($l->t('Sort order')); ?>">
							<option value="fn"><?php p($l->t('Display name')); ?></option>
							<option value="fl"><?php p($l->t('First- Lastname')); ?></option>
							<option value="lf"><?php p($l->t('Last-, Firstname')); ?></option>
						</select>
					</td>
					<td class="info email">Email</td>
					<td class="info tel">Phone</td>
					<td class="info adr">Address</td>
					<td class="info categories"></td>
					<td colspan="4" class="actions">
						<a class="delete action permanent" title="<?php p($l->t('Delete')); ?>"></a>
						<a class="download svg action text permanent"><?php p($l->t('Download')); ?></a>
						<select class="groups svg action text permanent" name="groups">
							<option value="-1" disabled="disabled" selected="selected"><?php p($l->t('Groups')); ?></option>
						</select>
						<!--a class="favorite action svg inactive control permanent" title="<?php p($l->t('Favorite')); ?>"></a -->
						<a class="action text permanent merge"><?php p($l->t('Merge selected')); ?></a>
					</td>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<div class="hidden popup" id="ninjahelp">
			<a class="close" tabindex="0" role="button" title="<?php p($l->t('Close')); ?>"></a>
			<h2><?php p($l->t('Keyboard shortcuts')); ?></h2>
			<div class="help-section">
				<h3><?php p($l->t('Navigation')); ?></h3>
				<dl>
					<dt>j/Down</dt>
					<dd><?php p($l->t('Next contact in list')); ?></dd>
					<dt>k/Up</dt>
					<dd><?php p($l->t('Previous contact in list')); ?></dd>
					<dt>o</dt>
					<dd><?php p($l->t('Expand/collapse current addressbook')); ?></dd>
					<dt>n/PageDown</dt>
					<dd><?php p($l->t('Next addressbook')); ?></dd>
					<dt>p/PageUp</dt>
					<dd><?php p($l->t('Previous addressbook')); ?></dd>
				</dl>
			</div>
			<div class="help-section">
				<h3><?php p($l->t('Actions')); ?></h3>
				<dl>
					<dt>r</dt>
					<dd><?php p($l->t('Refresh contacts list')); ?></dd>
					<dt>a</dt>
					<dd><?php p($l->t('Add new contact')); ?></dd>
					<!-- dt>Shift-a</dt>
					<dd><?php p($l->t('Add new addressbook')); ?></dd -->
					<dt>Shift-Delete</dt>
					<dd><?php p($l->t('Delete current contact')); ?></dd>
				</dl>
			</div>
		</div>
		<div id="firstrun" class="hidden">
			<div>
			<?php print_unescaped($l->t('<h3>You have no contacts in your address book or your address book is disabled.</h3>'
				. '<p>Add a new contact or import existing contacts from a VCF file.</p>')) ?>
			<div id="selections">
				<button class="add-contact icon-plus text"><?php p($l->t('Add contact')) ?></button>
			</div>
			</div>
		</div>
		<form class="float" id="file_upload_form" action="<?php print_unescaped(OCP\Util::linkTo('contacts', 'ajax/uploadphoto.php')); ?>" method="post" enctype="multipart/form-data" target="file_upload_target">
			<input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>">
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php p($_['uploadMaxFilesize']) ?>" id="max_upload">
			<input type="hidden" class="max_human_file_size" value="(max <?php p($_['uploadMaxHumanFilesize']); ?>)">
			<input id="contactphoto_fileupload" type="file" accept="image/*" name="imagefile" />
		</form>
		<iframe name="file_upload_target" id='file_upload_target' src=""></iframe>
	</div> <!-- app-content -->
</div> <!-- app -->
<script id="cropBoxTemplate" type="text/template">
	<form id="cropform"
		class="coords"
		method="post"
		enctype="multipart/form-data"
		target="crop_target"
		action="{action}"
		>
		<input type="hidden" id="contactid" name="contactid" value="{contactid}" />
		<input type="hidden" id="addressbookid" name="addressbookid" value="{addressbookid}" />
		<input type="hidden" id="backend" name="backend" value="{backend}" />
		<input type="hidden" id="tmpkey" name="tmpkey" value="{tmpkey}" />
		<fieldset id="coords">
		<input type="hidden" id="x" name="x" value="" />
		<input type="hidden" id="y" name="y" value="" />
		<input type="hidden" id="w" name="w" value="" />
		<input type="hidden" id="h" name="h" value="" />
		</fieldset>
	</form>
	<iframe name="crop_target" id="crop_target" src=""></iframe>
</script>

<script id="addGroupTemplate" type="text/template">
	<div id="dialog-form" title="<?php p($l->t('Add group')); ?>">
		<fieldset>
			<input type="text" name="name" id="name" />
		</fieldset>
	</div>
</script>

<script id="groupListItemTemplate" type="text/template">
	<li class="group" data-type="{type}" data-id="{id}">
		<a class="name" role="button">{name}</a>
		<span class="utils">
			<a class="action delete tooltipped rightwards" title="<?php p($l->t('Delete group')); ?>"></a>
			<a class="action edit tooltipped rightwards" title="<?php p($l->t('Rename group')); ?>"></a>
			<span class="action numcontacts">{num}</span>
		</span>
	</li>
</script>

<script id="mergeContactsTemplate" type="text/template">
	<div id="dialog-merge-contacts" title="<?php p($l->t('Merge contacts')); ?>">
		<p><?php p($l->t('Which contact should the data be merged into?')); ?></p>
		<fieldset>
			<ul class="mergelist">
				<li><input id="mergee_{idx}" type="radio" name="contact" value="{id}"><label for="mergee_{idx}" >{displayname}</label></li>
			</ul>
		</fieldset>
		<p>
		<input type="checkbox" id="delete_other" name="delete_other" />
			<label for="delete_other"><?php p($l->t('Delete the other(s) after successful merge?')); ?></label>
		</p>
	</div>
</script>

<script id="contactListItemTemplate" type="text/template">
	<tr class="contact" data-id="{id}" data-parent="{parent}" data-backend="{backend}">
		<td class="name thumbnail">
			<input type="checkbox" name="id" value="{id}" /><a href="#{id}" class="nametext">{name}</a>
		</td>
		<td class="email">
			<a href="mailto:{email}">{email}</a>
			<a class="svg mailto hidden" title="<?php p($l->t('Compose mail')); ?>"></a>
		</td>
		<td class="tel">{tel}</td>
		<td class="adr">{adr}</td>
		<td class="categories">{categories}</td>
	</tr>
</script>

<script id="contactDragItemTemplate" type="text/template">
	<div class="dragContact thumbnail" data-id="{id}">
		{name}
	</div>
</script>

<script id="contactFullTemplate" type="text/template">
	<tr><td colspan="6">
	<form action="<?php print_unescaped(OCP\Util::linkTo('contacts', 'index.php')); ?>" method="post" enctype="multipart/form-data">
	<section id="contact" data-id="{id}">
	<ul>
		<li>
			<div id="photowrapper" class="propertycontainer" data-element="photo">
				<ul id="phototools" class="transparent hidden">
					<li><a class="action delete" title="<?php echo $l->t('Delete current photo'); ?>"></a></li>
					<li><a class="action edit" title="<?php echo $l->t('Edit current photo'); ?>"></a></li>
					<li><a class="action upload" title="<?php echo $l->t('Upload new photo'); ?>"></a></li>
					<li><a class="action cloud icon-cloud" title="<?php echo $l->t('Select photo from ownCloud'); ?>"></a></li>
				</ul>
				<a class="favorite action {favorite}"></a>
			</div>
			<div class="singleproperties">
			<input data-element="fn" class="fullname value propertycontainer" type="text" name="value" value="{name}" placeholder="<?php p($l->t('Name')); ?>" required />
			<a class="action edit"></a>
 			<fieldset class="n hidden editor propertycontainer" data-element="n">
			<ul>
				<li>
					<input class="value tooltipped rightwards onfocus" type="text" id="n_1" name="value[1]" value="{n1}" 
						placeholder="<?php p($l->t('First name')); ?>" 
						title="<?php p($l->t('First name')); ?>" />
				</li>
				<li>
					<input class="value tooltipped rightwards onfocus" type="text" id="n_2" name="value[2]" value="{n2}" 
						placeholder="<?php p($l->t('Additional names')); ?>" 
						title="<?php p($l->t('Additional names')); ?>" />
				</li>
				<li>
					<input class="value tooltipped rightwards onfocus" type="text" id="n_0" name="value[0]" value="{n0}" 
						placeholder="<?php p($l->t('Last name')); ?>" 
						title="<?php p($l->t('Last name')); ?>" />
				</li>
			</ul>
			<input class="value" type="hidden" id="n_3" name="value[3]" value="{n3}" />
			<input class="value" type="hidden" id="n_4" name="value[4]" value="{n4}" />
			</fieldset>
			<div class="groupscontainer propertycontainer" data-element="categories">
				<select class="hidden" id="contactgroups" title="<?php p($l->t('Select groups')); ?>" name="value" multiple></select>
			</div>
			<div>
				<select class="hidden" id="contactaddressbooks" title="<?php p($l->t('Select address book')); ?>" name="value"></select>
			</div>
			<dl class="form">
				<dt data-element="nickname">
					<?php p($l->t('Nickname')); ?>
				</dt>
				<dd data-element="nickname" class="propertycontainer">
					<input class="value tooltipped rightwards onfocus" type="text" name="value" value="{nickname}" title="<?php p($l->t('Enter nickname')); ?>" required />
					<a role="button" class="action delete" title="<?php p($l->t('Delete')); ?>"></a>
				</dd>
				<dt data-element="title">
					<?php p($l->t('Title')); ?>
				</dt>
				<dd data-element="title" class="propertycontainer">
					<input class="value tooltipped rightwards onfocus" type="text" name="value" value="{title}" title="<?php p($l->t('Enter title')); ?>" required />
					<a role="button" class="action delete" title="<?php p($l->t('Delete')); ?>"></a>
				</dd>
				<dt data-element="org">
					<?php p($l->t('Organization')); ?>
				</dt>
				<dd data-element="org" class="propertycontainer">
					<input class="value tooltipped rightwards onfocus" type="text" name="value" value="{org}" title="<?php p($l->t('Enter organization')); ?>" required />
					<a role="button" class="action delete" title="<?php p($l->t('Delete')); ?>"></a>
				</dd>
				<dt data-element="bday">
					<?php p($l->t('Birthday')); ?>
				</dt>
				<dd data-element="bday" class="propertycontainer">
					<input class="value tooltipped rightwards onfocus" type="text" name="value" value="{bday}" required />
					<a role="button" class="action delete" title="<?php p($l->t('Delete')); ?>"></a>
				</dd>
			</dl>
			</div>
		</li>
		<li>
			<ul class="email propertylist hidden">
			</ul>
		</li>
		<li>
			<ul class="tel propertylist hidden">
			</ul>
		</li>
		<li>
			<ul class="adr propertylist hidden">
			</ul>
		</li>
		<li>
			<ul class="url propertylist hidden">
			</ul>
		</li>
		<li>
			<ul class="impp propertylist hidden">
			</ul>
		</li>
		<li>
			<section class="note propertycontainer" data-element="note">
				<textarea class="value" placeholder="<?php p($l->t('Notes go here...')); ?>">{note}</textarea>
			</section>
		</li>
	</ul>
	<footer>
		<button class="cancel action text tooltipped downwards" title="<?php p($l->t('Cancel')); ?>"><?php p($l->t('Cancel')); ?></button>
		<button class="close text tooltipped downwards" title="<?php p($l->t('Close')); ?>"><?php p($l->t('Close')); ?></button>
		<button class="export action text tooltipped downwards" title="<?php p($l->t('Export as VCF')); ?>"><?php p($l->t('Download')); ?></button>
		<select class="add action text button" id="addproperty">
			<option value=""><?php p($l->t('Add field...')); ?></option>
			<option value="ORG"><?php p($l->t('Organization')); ?></option>
			<option value="TITLE"><?php p($l->t('Title')); ?></option>
			<option value="NICKNAME"><?php p($l->t('Nickname')); ?></option>
			<option value="BDAY"><?php p($l->t('Birthday')); ?></option>
			<option value="TEL"><?php p($l->t('Phone')); ?></option>
			<option value="EMAIL"><?php p($l->t('Email')); ?></option>
			<option value="IMPP"><?php p($l->t('Instant Messaging')); ?></option>
			<option value="ADR"><?php p($l->t('Address')); ?></option>
			<option value="NOTE"><?php p($l->t('Note')); ?></option>
			<option value="URL"><?php p($l->t('Web site')); ?></option>
		</select>
		<button class="delete action text float right tooltipped downwards" title="<?php p($l->t('Delete contact')); ?>"><?php p($l->t('Delete')); ?></button>
	</footer>
	</section>
	</form>
	</td></tr>
</script>

<script id="contactDetailsTemplate" class="hidden" type="text/template">
	<div class="email" type="text/template">
		<li data-element="email" data-checksum="{checksum}" class="propertycontainer">
			<span class="parameters">
				<select class="rtl type parameter" data-parameter="TYPE" name="parameters[TYPE][]">
					<?php print_unescaped(OCP\html_select_options($_['email_types'], array())) ?>
				</select>
				<input type="checkbox" class="parameter tooltipped rightwards" data-parameter="TYPE" name="parameters[TYPE][]" value="PREF" title="<?php p($l->t('Preferred')); ?>" />
			</span>
			<input type="email" class="nonempty value" name="value" value="{value}" x-moz-errormessage="<?php p($l->t('Please specify a valid email address.')); ?>" placeholder="<?php p($l->t('someone@example.com')); ?>" required />
			<span class="listactions">
				<a class="action mail tooltipped leftwards" title="<?php p($l->t('Mail to address')); ?>"></a>
				<a role="button" class="action delete tooltipped leftwards" title="<?php p($l->t('Delete email address')); ?>"></a>
			</span>
		</li>
	</div>
	<div class="tel" type="text/template">
		<li data-element="tel" data-checksum="{checksum}" class="propertycontainer">
			<span class="parameters">
				<select class="rtl type parameter" data-parameter="TYPE" name="parameters[TYPE][]">
					<?php print_unescaped(OCP\html_select_options($_['phone_types'], array())) ?>
				</select>
				<input type="checkbox" class="parameter tooltipped rightwards" data-parameter="TYPE" name="parameters[TYPE][]" value="PREF" title="<?php p($l->t('Preferred')); ?>" />
			</span>
			<input type="tel" class="nonempty value" name="value" value="{value}" placeholder="<?php p($l->t('Enter phone number')); ?>" required />
			<span class="listactions">
				<a role="button" class="action delete tooltipped leftwards" title="<?php p($l->t('Delete phone number')); ?>"></a>
			</span>
		</li>
	</div>
	<div class="url" type="text/template">
		<li data-element="url" data-checksum="{checksum}" class="propertycontainer">
			<span class="parameters">
				<select class="rtl type parameter" data-parameter="TYPE" name="parameters[TYPE][]">
					<?php print_unescaped(OCP\html_select_options($_['email_types'], array())) ?>
				</select>
				<input type="checkbox" class="parameter tooltipped rightwards" data-parameter="TYPE" name="parameters[TYPE][]" value="PREF" title="<?php p($l->t('Preferred')); ?>" />
			</span>
			<input type="url" class="nonempty value" name="value" value="{value}" placeholder="http://www.example.com/" required />
			<span class="listactions">
				<a role="button" class="action globe tooltipped leftwards" title="<?php p($l->t('Go to web site')); ?>">
				<a role="button" class="action delete tooltipped leftwards" title="<?php p($l->t('Delete URL')); ?>"></a>
			</span>
		</li>
	</div>
	<div class="adr" type="text/template">
		<li data-element="adr" data-checksum="{checksum}" data-lang="<?php p(OCP\Config::getUserValue(OCP\USER::getUser(), 'core', 'lang', 'en')); ?>" class="propertycontainer">
			<span class="float display">
				<label class="meta parameters"></label>
				<span class="adr">{value}</span>
			</span>
			<span class="listactions">
				<a class="action globe tooltipped leftwards" title="<?php p($l->t('View on map')); ?>"></a>
				<a class="action delete tooltipped leftwards" title="<?php p($l->t('Delete address')); ?>"></a>
			</span>
			<fieldset class="adr hidden editor">
				<ul>
				<li>
					<select class="rtl type parameter" data-parameter="TYPE" name="parameters[TYPE][]">
						<?php print_unescaped(OCP\html_select_options($_['adr_types'], array())) ?>
					</select>
					<input type="checkbox" id="adr_pref_{idx}" class="parameter tooltipped downwards" data-parameter="TYPE" name="parameters[TYPE][]" value="PREF" title="<?php p($l->t('Preferred')); ?>" /><label for="adr_pref_{idx}"><?php p($l->t('Preferred')); ?></label>
				</li>
				<li><!-- Note to translators: The placeholders for address properties should be a well known address
						so users can see where the data belongs according to https://tools.ietf.org/html/rfc2426#section-3.2.1 -->
					<input class="value stradr tooltipped rightwards onfocus" type="text" id="adr_2" name="value[2]" value="{adr2}" 
					placeholder="<?php p($l->t('1600 Pennsylvania Avenue, NW')); ?>"
					title="<?php p($l->t('Street address')); ?>" />
				</li>
				<li>
					<input class="value zip tooltipped rightwards onfocus" type="text" id="adr_5" name="value[5]" value="{adr5}" 
						placeholder="<?php p($l->t('20500')); ?>"
						title="<?php p($l->t('Postal code')); ?>" />
					<input class="value city tooltipped rightwards onfocus" type="text" id="adr_3" name="value[3]" value="{adr3}" 
						placeholder="<?php p($l->t('Washington, DC')); ?>"
						title="<?php p($l->t('City')); ?>" />
				</li>
				<li>
					<input class="value region tooltipped rightwards onfocus" type="text" id="adr_4" name="value[4]" value="{adr4}" 
						placeholder="<?php p($l->t('District of Columbia')); ?>"
						title="<?php p($l->t('State or province')); ?>" />
				</li>
				<li>
					<input class="value country tooltipped rightwards onfocus" type="text" id="adr_6" name="value[6]" value="{adr6}" 
						placeholder="<?php p($l->t('USA')); ?>"
						title="<?php p($l->t('Country')); ?>" />
				</li>
			</ul>
			<input class="value pobox" type="hidden" id="adr_0" name="value[0]" value="{adr0}" />
			<input class="value extadr" type="hidden" id="adr_1" name="value[1]" value="{adr1}" />
			</fieldset>
		</li>
	</div>
	<div class="impp" type="text/template">
		<li data-element="impp" data-checksum="{checksum}" class="propertycontainer">
			<span class="parameters">
				<select class="type parameter" data-parameter="TYPE" name="parameters[TYPE][]">
					<?php print_unescaped(OCP\html_select_options($_['impp_types'], array())) ?>
				</select>
				<input type="checkbox" class="parameter impp tooltipped downwards" name="parameters[TYPE][]" value="PREF" title="<?php p($l->t('Preferred')); ?>" />
			</span>
				<div class="select_wrapper">
				<select class="ltr parameter label impp" data-parameter="X-SERVICE-TYPE" name="parameters[X-SERVICE-TYPE]">
					<?php print_unescaped(OCP\html_select_options($_['im_protocols'], array())) ?>
				</select>
				</div>
			<input type="text" class="nonempty value" name="value" value="{value}"
					placeholder="<?php p($l->t('Instant Messenger')); ?>" required />
			<span class="listactions">
				<a role="button" class="action delete tooltipped leftwards" title="<?php p($l->t('Delete IM')); ?>"></a>
			</span>
		</li>
	</div>
</script>

<script id="addressBookTemplate" class="hidden" type="text/template">
<li data-id="{id}" data-backend="{backend}" data-permissions="{permissions}">
	<input type="checkbox" name="active" checked="checked" title="<?php p($l->t('Active')); ?>" />
	<label>{displayname}</label>
	<span class="actions">
		<a title="<?php p($l->t('Share')); ?>" class="share action" data-possible-permissions="{permissions}" data-item="{id}" data-item-type="addressbook"></a>
		<a title="<?php p($l->t('Export')); ?>" class="download action"></a>
		<a title="<?php p($l->t('CardDAV link')); ?>" class="globe action"></a>
		<a title="<?php p($l->t('Edit')); ?>" class="edit action"></a>
		<a title="<?php p($l->t('Delete')); ?>" class="delete action"></a>
	</span>
</li>
</script>
