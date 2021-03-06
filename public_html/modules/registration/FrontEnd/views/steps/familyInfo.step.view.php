<div class="contentArea">
    <h1><?php echo $pageTitle; ?></h1>

    <p style="text-align: center; margin: 30px;"><?php echo $headerMessage; ?></p>

    <form method="post" action="" id="familyInfo">
        <fieldset>
            <legend>Father Information</legend>
            <label for="father_first">First Name: </label><input type="text" name="father_first" id="father_first"
                                                                 autocomplete="off"
                                                                 value="<?php echo $familyInfo['father_first']; ?>"/><br/>
            <label for="father_last">Last Name: </label><input type="text" name="father_last" autocomplete="off"
                                                               value="<?php echo $familyInfo['father_last']; ?>"/><br/>
            <label for="father_cell">Cell Phone: </label><input type="text" name="father_cell" id="father_cell"
                                                                autocomplete="off"
                                                                value="<?php echo $familyInfo['father_cell']; ?>"/><br/>
        </fieldset>
        <fieldset>
            <legend>Mother Information</legend>
            <label for="mother_first">First Name: </label><input type="text" name="mother_first" autocomplete="off"
                                                                 value="<?php echo $familyInfo['mother_first']; ?>"/><br/>
            <label for="mother_last">Last Name: </label><input type="text" name="mother_last" autocomplete="off"
                                                               value="<?php echo $familyInfo['mother_last']; ?>"/><br/>
            <label for="mother_cell">Cell Phone: </label><input type="text" name="mother_cell" id="mother_cell"
                                                                autocomplete="off"
                                                                value="<?php echo $familyInfo['mother_cell']; ?>"/><br/>
        </fieldset>
        <fieldset>
            <legend>E-mail Information</legend>
            <label for="primary_email">Primary E-mail: </label><input type="text" name="primary_email"
                                                                      autocomplete="off"
                                                                      value="<?php echo $familyInfo['primary_email']; ?>"/><br/>
            <label for="secondary_email">Secondary E-mail: </label><input type="text" name="secondary_email"
                                                                          autocomplete="off"
                                                                          value="<?php echo $familyInfo['secondary_email']; ?>"/><br/>
        </fieldset>
        <fieldset>
            <legend>General Information</legend>
            <label for="primary_phone">Home Phone: </label><input type="text" name="primary_phone" id="primary_phone"
                                                                  autocomplete="off"
                                                                  value="<?php echo $familyInfo['primary_phone']; ?>"/><br/>
            <label for="secondary_phone">Work Phone: </label><input type="text" name="secondary_phone"
                                                                    autocomplete="off"
                                                                    id="secondary_phone"
                                                                    value="<?php echo $familyInfo['secondary_phone']; ?>"/><br/>

            <label for="address">Address: </label><input type="text" name="address" autocomplete="off"
                                                         value="<?php echo $familyInfo['address']; ?>"/><br/>
            <label for="city">City: </label><input type="text" name="city" autocomplete="off"
                                                   value="<?php echo $familyInfo['city']; ?>"/><br/>
            <label for="state">State: </label><input type="text" name="state" autocomplete="off"
                                                     value="<?php echo $familyInfo['state']; ?>"/><br/>
            <label for="zip">Zip Code: </label><input type="text" name="zip" autocomplete="off"
                                                      value="<?php echo $familyInfo['zip']; ?>"/><br/>
        </fieldset>
      <?php if (!isset($hidePasswordFields)) { ?>
        <fieldset>
            <legend>Password</legend>
            <label for="password">Password: </label><input type="password" name="password" id="password"
                                                           autocomplete="off"
                                                           value="<?php echo $password; ?>"/><br/>
            <label for="confirm_password">Confirm Password: </label><input type="password" name="confirm_password"
                                                                           autocomplete="off"
                                                                           id="confirm_password"
                                                                           value="<?php echo $confirm_password; ?>"/><br/>
        </fieldset>
      <?php } ?>
        <br/>
        <input type="hidden" name="campus_id" value="<?php echo $currentCampus->getCampusId(); ?>"/>
        <input type="hidden" name="website_id" value="<?php echo $tsm->website->getWebsiteId(); ?>"/>
        <input type="hidden" name="school_year" value="<?php echo $currentCampus->getCurrentSchoolYear(); ?>"/>
        <input type="hidden" name="<?php echo $submitField; ?>" value="1"/>
        <input type="hidden" name="registerNow" value="1"/>
        <input type="submit" class="submitButton" style="float: right;" value="Next Step"/>
        <br/><br/><br/>
    </form>
    <script type="text/javascript">
        $("#primary_phone,#secondary_phone,#father_cell,#mother_cell").mask("(999) 999-9999");
        $("#familyInfo").validate({
            rules:{
                father_first:"required",
                father_last:"required",
                mother_first:"required",
                mother_last:"required",
                primary_phone:{
                    required:function (element) {
                        if ($("#father_cell").val() == "" && $("#mother_cell").val() == "") {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                father_cell:{
                    required:function (element) {
                        if ($("#primary_phone").val() == "" && $("#mother_cell").val() == "") {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                mother_cell:{
                    required:function (element) {
                        if ($("#father_cell").val() == "" && $("#primary_phone").val() == "") {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                address:"required",
                city:"required",
                state:"required",
                zip:"required",
                primary_email:{
                    required:true,
                    email:true
                },
                secondary_email:{
                    required:false
                },
                secondary_phone:{
                    required:false
                },
                password:"required",
                confirm_password:{
                    required:true,
                    minlength:5,
                    equalTo:"#password"
                }

            }
        });
    </script>
</div>