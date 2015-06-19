<?php //Initialize models needed for the table
$site_info = new site_info_model($serial_number);
?>

	<h2>Site Info</h2>

		<table class="table table-striped">
			<tbody>
				<tr>
					<td>Site Name</td>
					<td><?php echo $site_info->site_name; ?></td>
				</tr>
				<tr>
					<td>Region Name</td>
					<td><?php echo $site_info->region_name; ?></td>
				</tr>
				<tr>
					<td>Site Code</td>
					<td><?php echo $site_info->site_code; ?></td>
				</tr>
				<tr>
					<td>School Type</td>
					<td><?php echo $site_info->school_type; ?></td>
				</tr>
			</tbody>
		</table>