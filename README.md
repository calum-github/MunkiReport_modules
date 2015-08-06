# MunkiReport Modules

These are some reporting modules that I have created for use with MunkiReport PHP 2

Feel free to use

#### Instructions for adding a module

Copy the module folder into the app/modules folder inside the munkireport directory on your server

#### Adding a module to the client tab (optional)

To show the module as a tab in the client view and add a listing view for it, we need to add a custom javascript file. Copy the custom folder into the munkireport directory on your server.


#### Adding Widgets to the dashboard
If you have created some widgets and want to display them on the dashboard all you need to do is
include the name of the widget in the dashboard arrays in the config.php file:
```
	$conf['dashboard_layout'] = array(
		array('clients_per_region','client_per_site')
	);
```

