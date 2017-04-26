# orgaction
ORG theme for Campaignon

A subtheme which inherits Campaignon's simplicity theme.

Modifies page layout to add a full-width title, and also adds ORG's footer text.

## Installation

Install to $DOCUMENTROOT/sites/all/themes

## Full width banner

In Campaignion control panel, go to:

Structure & Appearance -> Advanced structure -> file types

In the image type, click "Manage file display", and in the "default" tab set the "image style" dropdown to "none".

To move the banner image, go to:

structure & appearance -> advanced structure -> context

Edit the context rule "region_content_top_default".  In the reactions panel, click on "blocks".  Drag the field_main_image block into the "banner" region.  Save.

If drag&drop is unavailable, it may be necessary to remove the field_main_image block and re-add it to banner region.

## Footer

Go to structure & appearance -> blocks, select "add block".  Add a description.

In the editor, click the "Source" button, and paste in the footer from the html file in the git repo.

In the region settings, open the dropdown for the current theme and choose "footer".

## Further Actions

This block should be created with the Full HTML text format, and pasted in source mode.  Select "Content Bottom" for the region, and restrict this block to pages that match "thanks*" URLs.

## Summary view

This view block is used to position a short piece of introductory text (the node summary) above the content in desktop view, and ahead of the petition/survey action in mobile view.  It can be imported through the Views UI.


