<div class="contentArea">
    <h1>Pay By Mail</h1>

    <p style="text-align: center;">Please send a check in the amount of
        <b>$<?php echo $firstInvoice['amount']; ?></b> to the address below.
        <br/><br/>
      <?php
      if (isset($campusInfo['payment_address_attn'])) {
        echo $campusInfo['payment_address_attn']."<br />";
      }
      echo $campusInfo['payment_address'];
      if (isset($campusInfo['payment_address_attn'])) {
        echo ", ".$campusInfo['payment_address2']."<br />";
      } else {
        echo "<br />";
      }
      echo $campusInfo['payment_city'].", ";
      echo $campusInfo['payment_state']." ";
      echo $campusInfo['payment_zip'];

      ?>
        <br/><br/>
        <a href="index.php?com=registration&action=payByMail&invoice_id=<?php echo $invoice_id; ?>&setupComplete=1"
           class="submitButton" target="_parent">Finished</a></p>
</div>