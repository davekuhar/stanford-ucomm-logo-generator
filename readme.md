# Stanford Logo Generator

**Contributors: Perception System and Dave Kuhar**

**Tags: logo generator**

**Requires at least: 5.0** 

**Tested up to: 5.4.1** 

**Requires PHP: 7.0**

This plugin is used to generate logos based on the user's selection from a set of approved layouts. There are one to three fields for user input based on their selected layout.

This generator requires Python scripts and other assets that would be installed on a remote server of your choosing. For initial deployment these files reside on a AWS t2.medium server maintained by Stanford UIT.

# Installation

Upload the stanford-logo-generator.zip file through the Plugins admin screen.

   - Navigate to Plugins > Add New.
   - Click the Upload Plugin button at the top of the screen.
   - Select the zip file from your local filesystem.
   - Click the Install Now button.
   - When installation is complete, you'll see "Plugin installed successfully." Click the Activate Plugin button at the bottom of the page.

# Plugin Files

    assets 
        -css 
             bootstrap.min.css 
             sf-public-style.css 
        -images
        -js
            bootstrap.min.js
            sf-public-script.js
    includes
        horizontal_layout_options.php
        listing_shortcode.php
        vertical_layout_options.php
    stanford-logo-generator.php 
    
# Configuration and Implementation
This plugin requires no configuration. Add the shortcode `[stanford_logo_generator]` to the page you'd like to use for the generator.