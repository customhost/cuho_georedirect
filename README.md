This is a pretty-simple but powerful ExpressionEngine addon which gives you a tool to redirect visitors from each country to the different URLs.
Module using GeoIP database to detect visitor's country.

#### Change log

**v1.1**: Compatibility with ExpressionEngine 2.4 - 2.7

**v1.2**: Rule removal bugfix for webkit browsers ( Chrome, Safari )

**v1.3**: Added "redirect once" rule

**v1.4**: GPL License

**v1.5**: Saving form fix for EE 2.9.2

#### 1. Installing module

Unpack archive and copy catalog "cuho_georedirect" to your site catalog "system/expressionengine/third_party"
After that, navigate to your site modules using menu "Add-ons > Modules".
Find module named "Geo Redirects" and click "Install" link.

_**Notice:** This module requires PHP GeoIP library, but if your server configuration has no installed library, module will use internal wrapper for GeoIP._

#### 2. Update template

You should add one additional line to your template right after "&lt;body&gt;" tag.
This templates usually called "header" or "page_header".
Find "&lt;body&gt;" tag and add right after

    {exp:cuho_georedirect:checkRedirect}

_**Please note:** if you are not sure where to place that code, please ask professionals for help to avoid troubles with your site._

#### 3. Using module

After module was properly installed you can enter to the module rules builder: go to menu "Add-ons > Modules".
Find module "**Geo Redirects**" and click on module name.

#### 4. Redirect modes

Module have a three operation modes:

*   **"Instant redirect"** &mdash; without any message
*   **"Pop-up"** &mdash; ask to confirm proposed redirect by showing pop-up message with URL, text and action links
*   **"Instant single redirect"** &mdash; redirects visiton without any message but only ONCE

#### 5. Redirect rules

To create a new rule, click "add entry" link new to the "Redirect rules" caption. This action will add new "Redirect entry" block with fields.

Enter necessary values to the fields:

*   **"Country"** &mdash; select country from the list. All visitors from selected country will be redirected to the URL or will see your message.
*   **"URL"** &mdash; address where visitor will be redirected.
*   **"Pop-up title"** &mdash; if your module configured to work in "Pop-up" mode, this text will be shown as a pop-up message title
*   **"Pop-up message"** &mdash; aslo for "Pop-up" mode, this text will be shown as a message in a pop-up

_**Please note:** "Country" and "URL" is a mandatory fields, you should always enter valid values for this fields._

**"Pop-up title"** and **"Pop-up message"** may be empty if your module works in "Instant redirect" mode, but do not leave it empty for "Pop-up" mode;

After fields was populated, click "Save changes" button in bottom to save your rules.

**Delete a rule**
To delete defined rule click "remove" link in a top right corner of the "Redirect entry" block, and confirm rule removal.

#### 6. Multiple entries for the same country

Module support only one rule per country.
Please, do not create more that one rule for each country. All extra rules will be removed.

#### 7. Pop-up window

Second mode **"Pop-up"** will show fancy box which will apper in a page top.
User will not be automatically redirected until click **_"ok, redirect me please"_**. After that, user will be redirected on all further visits of the site.

Click on **_"not this time"_** will hide pop-up window for the moment, but pop-up will be shown again on each next page.

**_"never ask"_** link will hide message and remember user choice. Message will never displayed for this user again.

Please note: "redirect me" and "never ask" will be remembered for particular browser and computer. If the same visitor open siet in another browser &mdash; message will be shown again.

#### 8. Desing: change pop-up box styling

Pop-up box styling represented by a couple rules:

`#cuho_georedirect_content` &mdash; mail content block, you can define message text colour and font size here.

`#cuho_georedirect_content h4` &mdash; message title style, you can change padding, marging, colour and font parameters.

`#cuho_georedirect_content .georedirect_message` &mdash; message text style, you can change colour and font parameters.

`#cuho_georedirect_content .georedirect_link` &mdash; message URL style, you can change colour and font parameters.

`#cuho_georedirect_content .georedirect_notice` &mdash; bottom notice message block, you change change padding, marging, colour and font parameters.

`#cuho_georedirect_close` &mdash; links block style, you can change padding, marging, alignment for the block;

`#cuho_georedirect_popup a` &mdash; action links style, you can change colour and font parameters.

`#cuho_georedirect_popup a:hover` &mdash; action links style when mouse cursor is on, you can change colour and font parameters.
