<div class="col-lg-4 col-md-6">

        <div id="site-info-site-widget" class="panel panel-default">

                <div class="panel-heading" data-container="body" title="Client Count Per Site">

                <h3 class="panel-title"><i class="fa fa-sitemap"></i> Client Count Per Site  <span class="counter badge pull-right"></span></h3>

                </div>
                <div class="list-group scroll-box"></div>

        </div><!-- /panel -->

</div><!-- /col -->

<script>
$(document).on('appReady appUpdate', function(){

    $.getJSON( appUrl + '/module/site_info/get_groups/site_name', function( data ) {

        var scrollBox = $('#site-info-site-widget .scroll-box').empty();

        $.each(data, function(index, obj){
            var name = obj.site_name || 'Unknown';
            scrollBox
                .append($('<a>')
                    .addClass('list-group-item')
                    .attr('href', appUrl + '/module/site_info/listing/#' + name)
                    .append(name)
                    .append($('<span>')
                        .addClass('badge pull-right')
                        .text(obj.count)));

        });

	$('#site-info-site-widget .counter').html(data.length);

        if( ! data.length){
            scrollBox
                .append($('<span>')
                    .addClass('list-group-item')
                    .text(i18n.t('no_clients')))
        }

    });
});
</script>
