<div class="wrap">
  <h2>Settings</h2>
  <form method="post" action="" id="one_esports_stats_form">
    <table class="form-table">
      <tr>
        <th scope="row"><label for="one_esports_stats_panda_token">Panda Token:</label></th>
        <td>
            <?php $token = $options['panda_token']; ?>
            <input 
                placeholder="Panda API token" 
                class="term" 
                type="text" 
                name="one_esports_stats_panda_token" 
                id="one_esports_stats_panda_token"
                value="<?= $token ?>"
            />
        </td>
      </tr>
    </table>
    <p class="submit">
      <input type="submit" name="one_esports_stats_submit" class="button-primary" value="Save Settings" />
    </p>
  </form>
</div>