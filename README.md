# Premiership Winners Filter Plugin
- This is a plugin for Wordpress which adds filterable details about the winner and the runner up of the English Premiership football league for the last 11 years.
- The plugin saves data via custom post types, post meta data, taxonomies and terms, and registers a display shortcode which displays a dropdown menu of filterable options.
- The plugin is written with an OOP approach and uses an MVC type framework to separate concerns into models for database interaction, views for html and controllers to direct results to a view.

The plugin uses WP_Query and bespoke Wordpress database queries to retrieve data.

## WHO IS IT FOR? 
STUDENTS - Learning how to:
- Use custom post types, post meta data and taxonomies and MySQL queries to create unique content.
- Adopt an MVC approach, even in Wordpress plugins.
- Adopt OOP practices in plugin creation.
- Create scalable plugins.
SPORTS SITES - This could be a useful plugin for any football or sports based websites.

## DISPLAY:
The plugin has a form allowing the end user to filter and compare 3 categories:
1. Filters on points total - winner with highest/ lowest points, runner up with highest, lowest points etc.
2. Filters on goals - winner with highest/lowest goals, runner-up with highest/lowest goals etc.
3. Averages - average points to win the league, average runner-up points total.

## SET UP
On activation, this plugin creates a custom post type called 'teams'.
The plugin sets up these taxonomies related to the custom post type 'teams'.
a) Team - 'team name'
b) Season - '2009-2010', '2010-2011' etc.
c) Position - for 'Winner' and 'Runner Up' terms

## SCALABILITY
- The plugin can be extended by adding the winners and runners-up of more seasons.
- The plugin could be extended to include a 'League' and/ or 'Country' taxonomy to include league positions for every football league in the world for every season.

## DATABASE INTERRACTION
Most database searches make use of WP_Query as recommended. 
However the average points and plugin deactivation methods make use of more advanced wpdb queries:
- Advanced DELETE and INNER JOIN statements when deactivating the plugin.
- Inner Joins - joins multiple wp tables
- Subqueries - a search statement searches from other search results.
- MySQL aggregate function and grouping commands.




