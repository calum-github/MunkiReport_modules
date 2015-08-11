<div class="col-lg-4 col-md-6">

	<div id="site-info-region-widget" class="panel panel-default">

		<div class="panel-heading" data-container="body" title="Client Count Per Region">

	    	<h3 class="panel-title"><i class="fa fa-sitemap"></i> Client Count Per Region</h3>

		</div>
		
		<div class="list-group scroll-box"></div>

	</div><!-- /panel -->

</div><!-- /col -->

<script>
$(document).on('appReady appUpdate', function(){

    $.getJSON( appUrl + '/module/site_info/get_groups/region_name', function( data ) {

        var scrollBox = $('#site-info-region-widget .scroll-box').empty();

        $.each(data, function(index, obj){
            var name = obj.region_name || 'Unknown';
            scrollBox
                .append($('<a>')
                    .addClass('list-group-item')
                    .attr('href', appUrl + '/module/site_info/listing/#' + name)
                    .append(name)
                    .append($('<span>')
                        .addClass('badge pull-right')
                        .text(obj.count)));

        });

        if( ! data.length){
            scrollBox
                .append($('<span>')
                    .addClass('list-group-item')
                    .text(i18n.t('no_clients')))
        }

    });				
});
</script>
