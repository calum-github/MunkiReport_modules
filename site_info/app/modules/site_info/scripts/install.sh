#!/bin/bash

# bluetooth controller
CTL="${BASEURL}index.php?/module/site_info/"

# Get the scripts in the proper directories
${CURL} "${CTL}get_script/site_info.sh" -o "${MUNKIPATH}preflight.d/site_info.sh"

# Check exit status of curl
if [ $? = 0 ]; then
    # Make executable
    chmod a+x "${MUNKIPATH}preflight.d/site_info.sh"

    # Set preference to include this file in the preflight check
    setreportpref "site_info" "${CACHEPATH}site_info.txt"

else
    echo "Failed to download all required components!"
    rm -f "${MUNKIPATH}preflight.d/site_info"

    # Signal that we had an error
    ERR=1
fi
