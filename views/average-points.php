<div class="pwf-intro-text">
  <h4>We took all the data of Premiership winners and runners up over the last <?php //echo $number_of_seasons; ?> years. Filter the results from  the drop-down menu below.
  </h4>
</div>

<div class="pwf-flexbox-grid">
  <div>
    <p>Filter by most and least points</p>
    <div class="pwf-select-menu">
      <form action="<?php esc_url( get_the_permalink() ) ?>" method="post">
      <?php wp_nonce_field( 'pwf_form_action', 'pwf_form_nonce' ); ?>
      <select name="pwf-options">
        <option value="winners_runners_up_highest_points">Winners & runners-up - Highest Points</option>
        <option value="winners_highest_points">Winners - Highest Points</option>
        <option value="runners_up_highest_points">Runners-Up - Highest Points</option>
        <option value="winners_lowest_points">Winners - Lowest Points</option>
        <option value="runners_up_lowest_points">Runners-Up - Lowest Points</option>
      </select>
    </div>
      <div class="pwf-form-button">
        <input type="submit" value="Filter by points">
      </div>
      </form>

    <p>Filter by most and least goals</p>
    <div class="pwf-select-menu">
      <form action="<?php esc_url( get_the_permalink() ) ?>" method="post">
      <?php wp_nonce_field( 'pwf_form_action', 'pwf_form_nonce' ); ?>
      <select name="pwf-options">
        <option value="winners_most_goals">Winners - Most goals</option>
        <option value="runners_up_most_goals">Runners-Up - Most goals</option>
        <option value="winners_least_goals">Winners - Least goals</option>
        <option value="runners_up_least_goals">Runners-Up - Least goals</option>
        <option value="winners_least_goals_conceded">Winners - Least goals conceded</option>
        <option value="runners_up_least_goals_conceded">Runners-Up - Least goals conceded</option>

      </select>
    </div>
      <div class="pwf-form-button">
        <input type="submit" value="Filter by goals">
      </div>
      </form>

    <p>Filter by averages</p>
    <div class="pwf-select-menu">
      <form action="<?php esc_url( get_the_permalink() ) ?>" method="post">
      <?php wp_nonce_field( 'pwf_form_action', 'pwf_form_nonce' ); ?>
      <select name="pwf-options">
        <option value="average_points">Average points</option>
      </select>
    </div>
      <div class="pwf-form-button">
        <input type="submit" value="Filter by averages">
      </div>
      </form>
  </div>

  <div>
    <h2>Average points totals</h2>
    <?php foreach( $results as $result ): ?>
      <h3><?php echo $result->name; ?>:</h3>
      <h3><?php echo $result->average; ?> points</h3>
    <?php endforeach; ?>
  </div>

</div>