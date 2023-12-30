<div class="wrap">
  <h2>Settings</h2>
  <form method="post" action="" id="one_news_form">
    <table class="form-table">
      <tr>
        <th scope="row"><label for="one_news_feed_url">RSS Feed URL:</label></th>
        <td>
            <?php $feedUrl = $options['feed_url']; ?>
            <input 
                placeholder="Feed URL" 
                class="term" 
                type="text" 
                name="one_news_feed_url" 
                id="one_news_feed_url"
                value="<?= $feedUrl ?>"
            />
        </td>
      </tr>
    </table>
    <p class="submit">
      <input type="submit" name="one_news_submit" class="button-primary" value="Save Settings" />
    </p>
  </form>
</div>