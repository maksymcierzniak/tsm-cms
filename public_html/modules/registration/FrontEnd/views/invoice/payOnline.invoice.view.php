<div class="contentArea">
    <h1>Pay Online</h1>
<p style="text-align: center;">You've chosen to pay invoice with reference number: <b><?php echo $firstInvoice['doc_number']; ?></b> in the
    amount of $<?php echo number_format($firstInvoice['amount'],2); ?> online.<br /> Please choose a payment option below.
    <br/><br/>
    <a target="_parent" class="payByPayPal"
       href="https://www.paypal.com/cgi-bin/webscr?notify_url=<?php echo $notify_url; ?>&amp;cmd=_xclick&amp;business=<?php echo $campusInfo['paypal_email']; ?>&amp;lc=US&amp;item_name=Invoice%20%23<?php echo $firstInvoice['family_invoice_id']; ?>&amp;currency_code=USD&amp;button_subtype=services&amp;no_note=1&amp;no_shipping=1&amp;rm=2&amp;return=<?php echo $return_url; ?>&amp;cancel_return=<?php echo $cancel_url; ?>&amp;bn=PP%2dBuyNowBF%3abtn_buynow_LG%2egif%3aNonHosted&amp;custom=<?php echo $familyInfo['family_id']; ?>&invoice=<?php echo $firstInvoice['family_invoice_id']; ?>"><img
            src="templates/100/images/paypal_button.gif" style="display: inline-block;"/></a>
  <?php if (isset($familyInfo['quickbooks_customer_id']) && $currentCampus->usesQuickbooks()) { ?>
    <form style="text-align: center;" method="post" target="_payByIpnWindow"
          action="https://ipn.intuit.com/payNow/start" id="payByIpnForm">
        <input type="hidden" name="eId" value="5152baca5e802cda"/> <input type="hidden" name="uuId"
                                                                          value="8a89fc3b-5f4b-49be-809e-8fc3a1ff0f32"/>
        <input type="image" id="payByIpnImg" style="background-color:transparent;border:0 none !important;"
               src="https://ipn.intuit.com/images/payButton/btn_PayNow_BLU_LG.png"
               alt="Make payments for less with Intuit Payment Network."/></form>
  <?php } ?>
    </p>
</div>
<script type="text/javascript">
    var payPalButton = $(".payByPayPal");
    $(".payByPayPal").click(function () {
        var payNow = confirm("PayPal payments are charged a 3% convenience fee. Do you wish to continue?");
        if (payNow) {
            $.get('index.php?mod=registration&ajax=addPayPalFeeToInvoice&family_invoice_id=<?php echo $firstInvoice['family_invoice_id']; ?>', function (data) {
                //alert(data);
                var response = JSON.parse(data);
                if (response.alertMessage != null) {
                    alert(response.alertMessage);
                }
                if (response.success == true) {
                    parent.window.location = payPalButton.attr("href") + "&amount=" + response.newTotal;
                }
            });
            return false;
        } else {
            return false;
        }

    });
  $("#payByIpnImg").click( function(){
    var payIntuit = confirm("Please be sure to enter \"<?php echo $firstInvoice['doc_number']; ?>\" for the Invoice/Reference # on the next screen to assure your payment is applied to the correct invoice.");
    if(!payIntuit){
      return false;
    }
  });
</script>