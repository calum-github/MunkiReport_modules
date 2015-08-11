/*!
 * Custom javascript for munkireport
 *
 */
$(document).on('appReady', function(e, lang) {
    
    // Add Site info to listing
    var listingDropdown = $('span[data-i18n="nav.main.listings"]').parent().next();
    listingDropdown.append(
        $('<li>')
            .append($('<a>')
                .attr('href', appUrl + '/module/site_info/listing')
                .text('Site info')));
        
	// Only run on the client_detail page
	if($('.client-tabs').length)
	{
		// Create site-info tab content
        var content = $('\
		<table class="table table-striped">\
			<tbody>\
				<tr>\
					<td>Site Name</td>\
					<td id="site-info-site_name"></td>\
				</tr>\
				<tr>\
					<td>Region Name</td>\
					<td id="site-info-region_name"></td>\
				</tr>\
				<tr>\
					<td>Site Code</td>\
					<td id="site-info-site_code"></td>\
				</tr>\
				<tr>\
					<td>School Type</td>\
					<td id="site-info-school_type"></td>\
				</tr>\
			</tbody>\
		</table>');

		// Add site-info to tabs
		var conf = {
			id: 'site-info',
			linkTitle: 'Site Info',
			tabTitle: 'Site Info',
			tabContent: content
		}
		addTab(conf);
        
        // Retrieve data for site-info tab
        $.getJSON( appUrl + '/module/site_info/get_data/' + serialNumber, function( data ) {
            // Set properties based on id
			$.each(data, function(prop, val){
				$('#site-info-'+prop).html(val);
			});

		});

		// Set correct tab on location hash
		loadHash();

	}

});
