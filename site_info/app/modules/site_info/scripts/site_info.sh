#!/bin/bash

#####################################################################
#                                                                   #
# Author:  Calum Hunter                                             #
# Date:    17-10-2014                                               #
# Version  0.1                                                      #
# Purpose: Script to capture the site and region                    #
#          and send this to our Munki Report server                 #
#                                                                   #
#####################################################################

# Skip manual check
#if [ "$1" = 'manualcheck' ]; then
#	echo 'Manual check: skipping'
#	exit 0
#fi

# Create cache dir if it does not exit
DIR=$(dirname $0)
mkdir -p "$DIR/cache"

# Location of our output cache file
site_info_file="/usr/local/munki/preflight.d/cache/site_info.txt"

# Get the site info out of our ARD Text field
site_name=`defaults read /Library/Preferences/com.apple.RemoteDesktop.plist Text1 | awk -F ": " '/Site/ {print $3}' | cut -d "," -f1`
region_name=`defaults read /Library/Preferences/com.apple.RemoteDesktop.plist Text1 | awk -F ": " '/Site/ {print $2}' | cut -d "," -f1`
school_type=`defaults read /Library/Preferences/com.apple.RemoteDesktop.plist Text1 | awk -F ": " '/Site/ {print $4}' | cut -d "," -f1`
site_code=`defaults read /Library/Preferences/com.apple.RemoteDesktop.plist Text1 | awk -F ": " '/Site/ {print $5}' | cut -d "," -f1`

# Write the results into our cache file
echo "Site_Name = $site_name" > $site_info_file
echo "Region_Name = $region_name" >> $site_info_file
echo "School_Type = $school_type" >> $site_info_file
echo "Site_Code = $site_code" >> $site_info_file

exit 0