
#!/bin/bash

# Remove Site Info script
rm -f "${MUNKIPATH}preflight.d/site_info.sh"

# Remove Site Info cache file
rm -f "${MUNKIPATH}preflight.d/cache/site_info.txt"

exit 0