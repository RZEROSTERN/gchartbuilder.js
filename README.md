#GChartBuilder.js

This jQuery plugin is intended for making the creation of Google Charts graphs a lot more comfortable.

Without the plugin, you would need to call lots of methods. Over time this results in confusing JS code.

GChartMaker.js has a very simple API, but it takes a little more time to learn than the MySQLDatabase class I've also done.

For now, I'm putting supporting only Google's core charts. I'll update this plugin with more graphics and compatibility with material design.

##Requirements
+jQuery 1.10 
+Google Charts API

You must have a PHP 5.4+ server in order to run the GoogleChartsDataModel class, included with this package. 

##Setup and usage
1. Download the code. There's a small bundled demo. I'll update it soon for making also database connections.
2. Place this line on your header:
	```html
	<script type="text/javascript" src="js/rzerogooglechartbuilder.min.js"></script>
	```
3. Don't forget to put this line between a `<script>` tag set:
	```javascript
	google.load('visualization', '1.0', {packages:['corechart']});
	```
4. This plugin requires a couple of datasets in the DOM node you want your chart in:
	1. data-graphictype: It's the type of graphic you want. This plugin uses the same syntax for the chart names in Google. [More info...](https://developers.google.com/chart/interactive/docs/gallery)
	2. data-urldata: This is the URI of your data bridge, this data bridge gathers all the content the graphic will get.
	```html
	<div id="bar-chart" data-graphictype="BubbleChart" data-urldata="data/getdata.php"></div>
	```
5. Finally (I assume you've your data bridge ready), use this line inside your $(document).ready method. The arguments for this method are:
	1. Graphic name.
	2. Serialized optional post vars. If you need to send data to your bridge, use this parameter. Only POST allowed.
	3. Width of the graphic. Default is 100%
	4. Height of the graphic. Default is auto.
	```javascript
	$$("#bar-chart").gchart_make_chart('Your graphic name', 'serialized=1&optional=1&postvars=1', '100', '100');
	```
6. If everything goes alright, you'll get a fancy GCharts graphic. Enjoy!

##The Data Bridge
GChartMaker.js requires a data bridge in PHP.

You have in data folder a class named GoogleChartsDataModel.class.php. This class must be instantiated in your data bridge.

```php
require("GoogleChartsDataModel.php"); # You MUST call the file :P
$gmod = new GoogleChartDataModel(); # INSTANCE
```

You have four methods in the class:

1. add_column -> Adds a column for the chart, the args are:
	1. id: ID of the column, REQUIRED
	2. label: Label of the column, REQUIRED
	3. pattern: Pattern for numeric vars, OPTIONAL
	4. type: Variable type, default is number
	5. p: CSS style for overwrite, OPTIONAL

2. add_row -> Adds a new row for the chart, the args are:
	1. name: Name of the row, REQUIRED
	2. You may insert as many arguments as you need according of the columns you have inserted.

3. render_array -> Renders the Google array as a PHP array mode.
4. render_json -> Renders the Google array as a JSON string. THIS STRING IS NEEDED FOR THE GRAPHICS RESULT.

For more information, check the demo. If you've doubts, comments or bugs, do not hesitate to drop a message. Donations are coming soon.
