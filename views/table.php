<div class="pwf-intro-text">
  <h4>We took all the data of Premiership winners and runners up over the last 11 years. Filter the results from  the drop-down menu below.
  </h4>
  <p><?php //echo PLUGIN_ROOT; ?></p>
  <?php //echo esc_url( get_the_permalink() ); ?>
</div>

<div class="pwf-flexbox-grid">
  <div>
    <p>Filter the results</p>
    <div class="pwf-select-menu">
    <form action="<?php esc_url( get_the_permalink() ) ?>" method="post">
    <?php wp_nonce_field( 'pwf_form_action', 'pwf_form_nonce' ); ?>
    <select name="pwf-options">
    <?php echo $form_options; ?>
    </select>
    </div>
    <div class="pwf-form-button">
    <input type="submit" value="Filter results">
    </div>
    </form>
  </div>

  <div>
    <div class="pwf-display-table">
      <table class="form-table">
        <tr>
          <th>Season</th>
          <th>Position</th>
          <th>Team</th>
          <th>Goals For</th>
          <th>Goals Against</th>
          <th>Points</th>
          </tr>
        
          <?php foreach( $results->posts as $result): ?>
            <tr>
            <td><?php echo esc_html( get_the_terms( $result->ID, 'season' )[0]->name ); ?></td>
            <td><?php  echo esc_html( get_the_terms( $result->ID, 'position' )[0]->name ); ?></td>
            <td><?php  echo $result->post_title; ?></td>
            <td><?php  echo esc_html( get_post_meta( $result->ID, 'Goals For', true ) ); ?></td>
            <td><?php  echo esc_html( get_post_meta( $result->ID, 'Goals Against', true ) ); ?></td>
            <td><strong><?php echo esc_html( get_post_meta( $result->ID, 'Points', true ) ); ?></strong></td>
            </tr>
          <?php endforeach; ?>

      </table>
    </div>
  </div>

</div>