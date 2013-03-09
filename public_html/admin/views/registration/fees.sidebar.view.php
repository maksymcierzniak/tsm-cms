<div id="sideBar" class="well span2">
    <ul class="nav nav-list">
        <li>
            <a href="index.php?com=registration" <?php if ($tsm->stringEndsWith($_SERVER["REQUEST_URI"], "index.php?com=registration")) {
              echo "class='active'";
            } ?>>Registration</a>
            <ul class="nav nav-list">
                <li>
                    <a href="index.php?com=registration&view=fees" <?php if ($tsm->stringEndsWith($_SERVER["REQUEST_URI"], "index.php?com=registration&view=fees")) {
                      echo "class='active'";
                    } ?>>Fees</a>
                </li>
              <?php if ($currentCampus->usesQuickbooks()) { ?>
                <li>
                    <a href="index.php?com=registration&view=fees&action=quickbooksInfo" <?php if ($tsm->stringEndsWith($_SERVER["REQUEST_URI"], "index.php?com=registration&view=fees&action=quickbooksInfo")) {
                      echo "class='active'";
                    } ?>>Quickbooks Info</a>
                </li>
              <?php } ?>
                <li>
                    <a href="index.php?com=registration&view=fees&action=conditions" <?php if ($tsm->stringEndsWith($_SERVER["REQUEST_URI"], "index.php?com=registration&view=fees&action=conditions")) {
                      echo "class='active'";
                    } ?>>Fee Conditions</a>
                </li>
                <li>
                    <a href="index.php?com=registration&view=fees&action=paymentPlans" <?php if ($tsm->stringEndsWith($_SERVER["REQUEST_URI"], "index.php?com=registration&view=fees&action=paymentPlans")) {
                      echo "class='active'";
                    } ?>>Payment Plans</a>
                </li>

            </ul>
        </li>
    </ul>
</div>