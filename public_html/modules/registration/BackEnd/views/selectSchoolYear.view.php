<h1>Select a School Year</h1>
<form action="" method="post" id="selectSchoolYearForm" style="text-align: center;">
    <select name="setSelectedSchoolYear" id="selectSchoolYear">
        <option value="">Choose a School Year</option>
      <?php for ($i = date('Y'); $i < date('Y') + 1; $i++) {
      $display = $i + 1;
      echo "<option value='$i'>$i - ".$display."</option>";
    } ?>
    </select>
</form>
<script type="text/javascript">
    $("#selectSchoolYearForm").change(function () {
        $("#selectSchoolYearForm").submit();
    });
</script>