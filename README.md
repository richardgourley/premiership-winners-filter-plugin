# Premiership Winners Filter Plugin
This is a plugin for Wordpress which adds details about the winner and the runner up of the English Premiership football league for the last 10 years.
The plugin saves data via custom post types and taxonomies, and registers a custom block for the user to add to any page that displays a search page for multiple advanced queries.

The plugin uses WP_Query and bespoke Wordpress database queries to retrieve data.

WHO IS IT FOR? 
STUDENTS - The plugin is highly scalable giving anyone learning PHP, MySQL or Wordpress an example of how to maximize custom post types and taxonomies to create fast scalable search results.
SPORTS SITES - This could be a useful plugin for any football or sports based websites.

FILTERING INFORMATION:
The plugin has a form allowing the user to filter and compare:
1. Highest points total for winners and runners-up in all seasons.
2. Winners highest points total
3. Runners-up highest points total
4. Winners lowest points total
5. Winner most goals scored
6. Winner least goals conceded
7. Average points for winners and runners-up overall

SET UP
On activation, this plugin creates a custom post type called 'teams'.
The plugin sets up these taxonomies related to the custom post type 'teams'.
a) Team - 'team name'
b) Season - '2009-2010', '2010-2011' etc.
c) Position - for 'Winner' and 'Runner Up' terms

SCALABILITY
The plugin could be extended to include a 'League' and/ or 'Country' taxonomy to include league positions for every league for every season and still produce fast results.

DISPLAY
The plugin provides both a custom block and a shortcode output for the html forms for the user to search results.

DATABASE INTERRACTION
Most database searches make use of WP_Query. However the advanced search for average points 
for winner and runner-up makes use of $wpdb and advanced MySQL, using:
- Inner Joins - joins wp tables
- Subqueries - works with columns from sub searches
- SUM()
- COUNT()




