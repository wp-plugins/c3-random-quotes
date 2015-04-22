=== c3 Random Quotes ===
Contributors: creed3
Donate link: http://development.creed3.com/?scripts
Tags: random, quote
Requires at least: 4.0
Tested up to: 4.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple widget to display random quotes on your WordPress site.


== Description ==

c3 Random Quotes displays a random quote each time your site (or page that displays the sidebar in which this widget is assigned to) is loaded.  
You create and maintain the list of quotes in a private page on your WordPress site.  
Quotes can be anything including customer comments.  
It's easily installed, features a few settings to adjust the appearance to your site template, and can be used in a sidebar, header, or footer depending on how your WordPress template is laid out.

Hat tip to Scott Ball, creator of the Super Simple Random Quotes plugin, from which this is inspired.

= Features: =

* Easy user management of quotes in a private WordPress page, as you would in a word processor.
* Provides a default quote to display until you can assemble your list of quotes.
* Settings allow control over quote appearance.
* Allows for the leading quotation mark to be normal text or to display an exaggerated quotation mark image.
* Can be placed anywhere on a WordPress site depending on where a template allows.


== Installation ==

= Installing the Widget =

1. Unzip the widget archive.
2. Upload the folder c3randomquotes to the /wp-content/plugins directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.
4. Add the widget to a sidebar and adjust the settings to suit your site.
5. Create a new page (NOT a post) on your WordPress site named 'Quotes For Widget' (without the quote marks) and set the 'Visibility' to 'Private'.
6. For a quick start open the file quotes.txt in the c3randomquotes folder, copy it's contents and paste in to the 'Quotes For Widget' page.
7. Save the 'Quotes For Widget' page and enjoy.

= Settings =
* Select how you want the leading quotation mark to appear in 'Leading quotation mark image'.  None displays a normal leading quotation mark in the same font as the quote appears.  Selecting a color displays the exaggerated leading quotation mark image.
* 'Width of the widget' allows for adjusting the width to suit your template, in pixels, formatted as 100px for example.  Often simply entering 100% will work perfect however there may be a situation you want to restrict the width to avoid a background graphic.
* Enter the 'Font size' to match your template, such as 10pt or 10px.
* 'Quote font color' and 'Author font color' are entered as hex numbers such as #af3f00.

= Editing Quotes =
Each quote in the 'Quotes For Widget' page is made up of 3 elements; the text of the quote, a delimiter character, and who the quote is attributed to, or author.
Each quote must be a line (or paragraph) of text unto itself and not combined with other quotes.
The delimiter, or divider, between the quote and it's author is the character '#'.  Don't change the delimiter or use the '#' character in the text of a quote as this will break the widget.
Take care not to leave any blank lines at the very top or bottom of the 'Quotes For Widget' page which may result in breaking the widget.


== Frequently Asked Questions ==

= My template doesn't allow for widgets in the header.  How can I add this? =

There are many good resources available online that discuss this very thing.  Search for 'WordPress add a template widget area' to see several.  Be warned this will require some code editing in your template files.  If you're not comfortable with this consider hiring a web designer to do this.

= I need a different shade of _this color_ to match my web site.  Is this possible? =

It is if you have a graphics editing application that can edit PNG files, such as Adobe Photoshop or Illustrator.  If you do simply follow these steps:
1. Download and install the font used (unless you want to use a different font) from here: <a href="http://www.ufonts.com/download/bard/23202.html" target="_blank">Bard.ttf</a>
2. Once you have the font installed, make a copy of the quote-white.png, and open in your application.
3. With the text edit tool, select the quotation mark and adjust the font color to what ever you prefer.
4. Save your the image, and upload to the images folder in the c3randomquotes folder in your WordPress plugins folder.
5. Go to the widget settings and select 'white' for the quotation mark image and Save your settings.


== Screenshots ==
1. The widget settings screen.
2. A quote displayed in a page header showing the white, leading quotation mark image.
3. A quote displayed in a page header showing the leading quotation mark as part of the quotation text.
4. A quote displayed in a sidebar showing the leading quotation mark as part of the quotation text.


== Changelog ==

= 1.0 =
Initial release


== Upgrade Notice ==

= 1.0 =
Initial release