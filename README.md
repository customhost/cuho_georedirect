This is a pretty-simple but powerful ExpressionEngine addon which gives you a tool to redirect visitors from each country to the different URLs.
Module using GeoIP database to detect visitor's country.

<h4>Change log</h4>
<b>v1.1</b>: Compatibility with ExpressionEngine 2.4 - 2.7
<br/>
<b>v1.2</b>: Rule removal bugfix for webkit browsers ( Chrome, Safari )
<br/>
<b>v1.3</b>: Added "redirect once" rule
<br/>
<b>v1.4</b>: GPL License

<h4>1. Installing module</h4>
Unpack archive and copy catalog "cuho_georedirect" to your site catalog "system/expressionengine/third_party"
After that, navigate to your site modules using menu "Add-ons > Modules".
Find module named "Geo Redirects" and click "Install" link.

<em><strong>Notice:</strong> This module requires PHP GeoIP library, but if your server configuration has no installed library, module will use internal wrapper for GeoIP.</em>

<h4>2. Update template</h4>
You should add one additional line to your template right after "&lt;body&gt;" tag.
This templates usually called "header" or "page_header".
Find "&lt;body&gt;" tag and add right after
<pre><code>&#123;exp:cuho_georedirect:checkRedirect&#125;</code></pre>

<em><strong>Please note:</strong> if you are not sure where to place that code, please ask professionals for help to avoid troubles with your site.</em>


<h4>3. Using module</h4>
After module was properly installed you can enter to the module rules builder: go to menu "Add-ons > Modules".
Find module "<strong>Geo Redirects</strong>" and click on module name.


<h4>4. Redirect modes</h4>
Module have a three operation modes:
<ul>
    <li><strong>"Instant redirect"</strong> &mdash; without any message</li>
    <li><strong>"Pop-up"</strong> &mdash; ask to confirm proposed redirect by showing pop-up message with URL, text and action links</li> 
    <li><strong>"Instant single redirect"</strong> &mdash; redirects visiton without any message but only ONCE</li>
</ul>


<h4>5. Redirect rules</h4>
To create a new rule, click "add entry" link new to the "Redirect rules" caption. This action will add new "Redirect entry" block with fields.

Enter necessary values to the fields:
<ul>
    <li><strong>"Country"</strong> &mdash; select country from the list. All visitors from selected country will be redirected to the URL or will see your message.</li>
    <li><strong>"URL"</strong> &mdash; address where visitor will be redirected.</li>
    <li><strong>"Pop-up title"</strong> &mdash; if your module configured to work in "Pop-up" mode, this text will be shown as a pop-up message title</li>
    <li><strong>"Pop-up message"</strong> &mdash; aslo for "Pop-up" mode, this text will be shown as a message in a pop-up</li>
</ul>

<em><strong>Please note:</strong> "Country" and "URL" is a mandatory fields, you should always enter valid values for this fields.</em>

<strong>"Pop-up title"</strong> and <strong>"Pop-up message"</strong> may be empty if your module works in "Instant redirect" mode, but do not leave it empty for "Pop-up" mode;
	
After fields was populated, click "Save changes" button in bottom to save your rules.

<strong>Delete a rule</strong>
To delete defined rule click "remove" link in a top right corner of the "Redirect entry" block, and confirm rule removal.


<h4>6. Multiple entries for the same country</h4>
Module support only one rule per country.
Please, do not create more that one rule for each country. All extra rules will be removed.

<h4>7. Pop-up window</h4>
Second mode <strong>"Pop-up"</strong> will show fancy box which will apper in a page top.
User will not be automatically redirected until click <strong><em>"ok, redirect me please"</em></strong>. After that, user will be redirected on all further visits of the site.

Click on <strong><em>"not this time"</em></strong> will hide pop-up window for the moment, but pop-up will be shown again on each next page.

<strong><em>"never ask"</em></strong> link will hide message and remember user choice. Message will never displayed for this user again.

Please note: "redirect me" and "never ask" will be remembered for particular browser and computer. If the same visitor open siet in another browser &mdash; message will be shown again.

<h4>8. Desing: change pop-up box styling</h4>
Pop-up box styling represented by a couple rules:
	<code><strong>#cuho_georedirect_content</strong></code> &mdash; mail content block, you can define message text colour and font size here.

	<code><strong>#cuho_georedirect_content h4</strong></code> &mdash; message title style, you can change padding, marging, colour and font parameters.

	<code><strong>#cuho_georedirect_content .georedirect_message</strong></code> &mdash; message text style, you can change colour and font parameters.
	
	<code><strong>#cuho_georedirect_content .georedirect_link</strong></code> &mdash; message URL style, you can change colour and font parameters.
	
	<code><strong>#cuho_georedirect_content .georedirect_notice</strong></code> &mdash; bottom notice message block, you change change padding, marging, colour and font parameters.
	
	<code><strong>#cuho_georedirect_close</strong></code> &mdash; links block style, you can change padding, marging, alignment for the block;
	
	<code><strong>#cuho_georedirect_popup a</strong></code> &mdash; action links style, you can change colour and font parameters.
	
	<code><strong>#cuho_georedirect_popup a:hover</strong></code> &mdash; action links style when mouse cursor is on, you can change colour and font parameters.
