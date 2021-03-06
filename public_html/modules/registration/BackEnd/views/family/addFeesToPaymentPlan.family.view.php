<div class="span9">
  <form action="index.php?mod=registration&ajax=addFeesToFamilyPaymentPlan&family_payment_plan_id=<?php echo $familyPaymentPlanId; ?>" method="post" id="paymentPlanForm">
    <h2>Add Fees To Payment Plan</h2>
    <p>Adding fees to this payment plan with adjust the monthly installments accordingly. If you do not want to add a certain fee to this payment plan, just uncheck the corresponding box.</p>
    <span class="right"><label class="checkbox"><input id="checkAll" type="checkbox" checked=checked> Check All</label></span>
    <?php foreach($students as $student){
      echo "<h3>".$student['info']['first_name']."".$student['last_name']."</h3>";
      foreach($student['fees'] as $fee){
        ?>
        <div class="well well-small">
          <div class="title"><?php echo $fee['name']; ?>: $<?php echo $fee['amount']; ?></div><input style="float: right; margin-top: -18px;" type="checkbox" class="feesToAdd" name="feesToAdd[]" data-tsm-amount="<?php echo $fee['amount']; ?>" value="<?php echo $fee['family_fee_id']; ?>" checked=checked/>
        </div>
        <?php
      }
    } ?>
    <div style="text-align: right; font-size: 20px">Plan Total: $<span id="planTotal"><?php echo $total; ?></span></div>
    <br />
    <span class="center">
      <input type="submit" class="btn btn-success btn-large right approvePlan" value="Add Fees Now" />
    </span>
  </form>
</div>
<script type="text/javascript">
  $(document).ready( function(){
    $('#checkAll').click(function(){
      if($(this).attr('checked') == 'checked'){
        $('input:checkbox').attr('checked','checked');
      } else {
        $('input:checkbox').removeAttr('checked');
      }
    });
    $('input:checkbox').click( function(){
      var totalAmount = 0;
      $("input:checkbox").not("#checkAll").each( function(){
        if($(this).attr("checked") == "checked"){
          totalAmount = totalAmount + parseFloat($(this).attr('data-tsm-amount'));
        }
      });
      $("#planTotal").html(totalAmount);
    });
  });
  $("#paymentPlanForm").submit( function(){
    var formData = $("#paymentPlanForm").serialize();
    $.post($(this).attr("action"), formData, function (data) {
      var response = JSON.parse(data);
      if (response.alertMessage != null) {
        alert(response.alertMessage);
      }
      if (response.success == true) {
        parent.window.location.reload();
      }
    });
    return false;
  });
</script>