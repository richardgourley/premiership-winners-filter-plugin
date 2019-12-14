# Premiership Winners Filter Plugin
This is a plugin for Wordpress which adds details about the winner and the runner up of the English Premiership football league for the last 10 years.
The plugin saves data via custom post types and taxonomies, and registers a custom block for the user to add to any page that displays a search page for multiple advanced queries.

The plugin uses WP_Query and bespoke Wordpress database queries to retrieve data.

WHO IS IT FOR? 
STUDENTS - The plugin is highly scalable giving anyone learning PHP, MySQL or Wordpress an example of how to maximize custom post types and taxonomies to create fast scalable search results.
SPORTS SITES - This could be a useful plugin for any football or sports based websites.

The user can filter the data to find out numerous pieces of information such as:
1. What the highest points total was to win the league.
2. What was the lowest points total to win the league.
3. Which runner up had a higher points total than the winner.
4. What was the highest and lowest goals total for winner and runner up.
5. What was the highest and lowest goals conceded for winners and runners up.
6. How many times a team won or finished runner up in the last 10 years.
7. Which team has won the most league titles.
8. Which team has finished runner up the most.
The user can also see winner and runner up for each individual year.

SET UP
On activation, this plugin creates a custom post type called 'teams'.
The plugin sets up these taxonomies related to the custom post type 'teams'.
a) Team
b) League (could extend the plugin to include leagues from around the world)
c) Season
d) Winner
e) Runner up

DISPLAY
The plugin provides both a custom block and a shortcode output for the html forms for the user to search results.




