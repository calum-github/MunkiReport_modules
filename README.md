# MunkiReport Modules

These are some reporting modules that I have created for use with MunkiReport PHP 2

Feel free to use

#### Instructions for adding a module

Copy the modules files into the relevant folders inside the munkireport directory on your server

#### Adding a module to the client tab (optional)

To show the module as a tab in the client view we need to edit 
```
/munkireport/app/views/client/client_detail.php
```

Look for the lines like this:
```
<li>
<a href="#ard-tab" data-toggle="tab">ARD</a>
</li>
```

Copy and paste an extra li block in and replace the text with the name of your module
so that it looks like this for example:
```
<li>
<a href="#site_info-tab" data-toggle="tab">Site Info</a>
</li>
```

Now in the same file look for the div class definitions:
```
<div class="tab-pane" id='bluetooth-tab'>
 <?$this->view('client/bluetooth_tab')?>
</div>
```

Copy and pase another one of these in and rename it to suit:
```
<div class="tab-pane" id='site_info-tab'>
 <?$this->view('client/site_info_tab')?>
</div>
```

#### Adding Widgets to the dashboard
If you have created some widgets and want to display them on the dashboard all you need to do is
include the name of the widget in the dashboard arrays in the config.php file:
```
	$conf['dashboard_layout'] = array(
		array('clients_per_region','client_per_site')
	);
```

