#!/bin/bash

# Munki Report Site Info Module Installer
# This installer will install the site info components into a munkireport instance

# Files to be installed
install="./app/modules/site_info/scripts/install.sh"
script="./app/modules/site_info/scripts/site_info.sh"
uninstall="./app/modules/site_info/scripts/uninstall.sh"
client_view="./app/views/client/site_info_tab.php"
listing_view="./app/views/listing/site_info.php"
widget_region="./app/views/widgets/clients_per_region_widget.php"
widget_site="./app/views/widgets/clients_per_site_widget.php"



# Start by asking the user for the location of the munkireport web root
echo "****************************************************"
echo "     Munki Report 'Site Info' Module Installer"
echo "****************************************************"
echo ""
echo "- Please provide the location of the munkireport webroot (ie: /www/munkireport) :-"
read munki_webroot
echo ""
echo "- Using $munki_webroot as the destination"
echo "- Creating required directories"
echo "     - $munki_webroot/app/modules/site_info/scripts"
mkdir -p $munki_webroot/app/modules/site_info/scripts
echo "- Copying scripts into place"
echo "    - $munki_webroot/app/modules/site_info/scripts/install.sh"
echo "    - $munki_webroot/app/modules/site_info/scripts/uninstall.sh"
echo "    - $munki_webroot/app/modules/site_info/scripts/site_info.sh"
cp $install $munki_webroot/app/modules/site_info/scripts/
cp $script $munki_webroot/app/modules/site_info/scripts/
cp $uninstall $munki_webroot/app/modules/site_info/scripts/
echo "- Copying views into place"
echo "    - $munki_webroot/app/views/client/site_info_tab.php"
echo "    - $munki_webroot/app/views/listing/site_info.php"
echo "    - $munki_webroot/app/views/widgets/clients_per_region_widget.php"
echo "    - $munki_webroot/app/views/widgets/clients_per_site_widget.php"
cp $client_view $munki_webroot/app/views/client/
cp $listing_view $munki_webroot/app/views/listing/
cp $widget_region $munki_webroot/app/views/widgets/
cp $widget_site $munki_webroot/app/views/widgets/
echo "- Module files are installed!!"
echo " "
echo "- You will now need to modify MR to display your information on the dashboard"
echo "- This method will change depending on the version of Munki Report, so you are on your own from here."
echo "*****************************************************"

exit 0
