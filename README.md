# Premiership Winners Filter Plugin
This is a plugin for Wordpress which adds filterable details about the winner and the runner up of the English Premiership football league for the last 10 years.
The plugin saves data via custom post types, post meta data, taxonomies and terms, and registers a display shortcode which displays a dropdown menu of filterable options.

The plugin uses WP_Query and bespoke Wordpress database queries to retrieve data.

WHO IS IT FOR? 
STUDENTS - The plugin will hopefully provide an example of how to create a plugin that maximizes Wordpress and MySQL to create a scalable plugin, with fast database interaction. It utilizes taxonomies and terms to allow for fast data retrieval from the database.  
SPORTS SITES - This could be a useful plugin for any football or sports based websites.

DISPLAY:
The plugin has a form allowing the user to filter and compare:
1. High points table showing and comparing winners and runners-up
2. Average points for winners and average points for runners-up
3. Winners highest points total
4. Runners-up highest points total
5. Winners lowest points total
6. Runners-up lowest points total
7. Winner most goals scored
8. Runner-up most goals scored
9. Winner least goals scored
10. Runner-up least goals scored
11. Winner least goals conceded
12. Runner-up least goals conceded


SET UP
On activation, this plugin creates a custom post type called 'teams'.
The plugin sets up these taxonomies related to the custom post type 'teams'.
a) Team - 'team name'
b) Season - '2009-2010', '2010-2011' etc.
c) Position - for 'Winner' and 'Runner Up' terms

SCALABILITY
The plugin could be extended to include a 'League' and/ or 'Country' taxonomy to include league positions for every football league in the world for every season .

DATABASE INTERRACTION
Most database searches make use of WP_Query as recommended. 
However the average points and plugin deactivation methods make use of more advanced wpdb queries:
- Advanced DELETE and INNER JOIN statements when deactivating the plugin.
- Inner Joins - joins multiple wp tables
- Subqueries - a search statement searches from other searc results.
- SUM()
- COUNT()




