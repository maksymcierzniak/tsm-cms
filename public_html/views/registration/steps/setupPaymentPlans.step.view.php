<div class="contentArea">
    <!--<h1><?php echo $planInfo['name']; ?></h1>-->
    <p style="text-align: center;"><?php echo $planInfo['description']; ?></p>

    <div class="infoSection">
      <?php
      foreach ($students as $student) {
        echo "<h2>".$student['studentInfo']['first_name']." ".$student['studentInfo']['last_name']."</h2>";
        foreach ($student['planFeeTypes'] as $fee_type_id => $fees) {
          ?>
            <h3 style="text-align: center;"><?php echo $reg->getFeeTypeName($fee_type_id); ?></h3>
            <table width="100%" cellpadding=10 cellspacing=0>
                <tr class="header" style="font-weight: bold; padding: 10px;">
                    <td>Program</td>
                    <td>Course</td>
                    <td>Fee Name</td>
                    <td>Fee Amount</td>
                </tr>
              <?php
              $i = 0;
              $odd = 1;
              foreach ($fees as $fee) {
                if ($odd == $i % 2) {
                  $style = "background: #ccc;";
                } else {
                  $style = "background: #fff;";
                }
                ?>
                  <tr style="<?php echo $style; ?>">
                      <td><?php if (isset($fee['program_name'])) {
                        echo $fee['program_name'];
                      } ?></td>
                      <td><?php if (isset($fee['course_name'])) {
                        echo $fee['course_name'];
                      } ?></td>
                      <td><?php echo $fee['name']; ?></td>
                      <td>$<?php echo $fee['amount']; ?></td>
                  </tr>
                <?php
                $i++;
              } ?>
              <?php echo "<tr><td colspan=3 align=right style=\"font-weight: bold;\">Grand Total: </td><td>$".$student['planFeeTotals'][$fee_type_id]."</td></tr>"; ?>
            </table>
          <?php
        }
        echo "<br /><br />";
      }
      ?>

        <div style="width: 300px; margin-left: auto;margin-right: auto;text-align: center;">
            <b>Total Due:</b> $<?php echo $paymentPlanTotal; ?><br/><br/>
            <a href="index.php?action=payOnline&invoice_id=<?php echo $invoice_id; ?>" class="submitButton fb"
               style="text-decoration: none; margin-right: 30px;">Pay Online</a> <a
                href="index.php?action=payByMail&invoice_id=<?php echo $invoice_id; ?>" class="submitButton fb"
                style="text-decoration: none;">Pay By Mail</a>
        </div>

        <br/><br/>
    </div>
</div>