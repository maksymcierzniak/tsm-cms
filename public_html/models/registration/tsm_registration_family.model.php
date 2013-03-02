<?php

class TSM_REGISTRATION_FAMILY extends TSM_REGISTRATION_CAMPUS {

  private $info;
  private $isLoggedIn;
  private $currentStep;
  private $students;
  private $schoolYearInfo;

  public function __construct($familyId = null) {
    global $logout;

    $tsm = TSM::getInstance();
    $this->tsm = $tsm;
    $this->db = $tsm->db;
    if (isset($familyId)) {
      $this->familyId = intval($familyId);
      $this->getInfo();
    } else if (isset($_SESSION['family']['id'])) {
      $this->familyId = intval($_SESSION['family']['id']);
      $this->getInfo();
    }

    if ($logout == 1) {
      //unset($_SESSION['family']['id']);
      session_destroy();
      header("Location: index.php");
    }
  }

  public function getFamilyId() {
    return $this->info['family_id'];
  }

  public function getCurrentStep() {
    $this->currentStep = null;
    if ($this->isLoggedIn() == false) {
      $this->currentStep = 1;
    } else {
      $q = "SELECT current_step FROM tsm_reg_families_school_years WHERE family_id = '".$this->familyId."' AND school_year = '".$this->getSelectedSchoolYear()."'";
      $r = $this->db->runQuery($q);
      while ($a = mysql_fetch_assoc($r)) {
        $this->currentStep = $a['current_step'];
      }
    }

    if ($this->currentStep == null) {
      $this->currentStep = 1;
    }

    return $this->currentStep;
  }

  public function saveFamily() {
    //if(isset($_POST['name']) && isset($_POST["website_id"]) && isset($_POST['school_year'])){
    if ($this->db->updateRowFromPost("tsm_reg_families", $this->familyId)) {
      return true;
    } else {
      //THERE WAS AN ERROR INSERTING THE ROW
      die("uhoh");
    }
    // } else {
    //    die("not all fields required.");
    //}
  }

  public function registerFamily() {
    if (isset($_POST['father_first']) && isset($_POST['father_last']) && isset($_POST["website_id"]) && isset($_POST['school_year'])) {
      if (isset($_POST['password'])) {
        $_POST['password'] = $this->tsm->createPassword($_POST['password']);
      }
      $family_id = $this->db->insertRowFromPost("tsm_reg_families");
      if ($family_id) {
        return $family_id;
      } else {
        //THERE WAS AN ERROR INSERTING THE ROW
        die("uhoh");
      }
    } else {
      die("not all fields required.");
    }
  }

  public function addStudent() {
    $student_id = $this->db->insertRowFromPost("tsm_reg_students");
    if ($student_id) {
      return $student_id;
    } else {
      //THERE WAS AN ERROR INSERTING THE ROW
      die("uhoh");
    }
  }

  public function moveToStep($step) {
    $q = "UPDATE tsm_reg_families_school_years SET current_step = '$step' WHERE family_id = '".$this->familyId."' AND school_year = '".$this->getSelectedSchoolYear()."'";
    $this->db->runQuery($q);

    return true;
  }

  public function moveToNextStep() {
    $nextStep = $this->getCurrentStep() + 1;
    $this->moveToStep($nextStep);

    return true;
  }

  public function addToSchoolYear($school_year) {
    $q = "SELECT family_id FROM tsm_reg_families_school_years WHERE family_id = '".$this->familyId."' AND school_year = '".$school_year."'";
    $r = $this->db->runQuery($q);
    if (mysql_num_rows($r) == 0) {
      $q = "INSERT INTO tsm_reg_families_school_years (family_id,current_step,school_year) VALUES('".$this->familyId."','1','".$school_year."')";
      $this->db->runQuery($q);
      return true;
    }
  }

  public function getCampusId() {
    return $this->info['campus_id'];
  }

  public function login($email, $password, $campus_id) {
    $q = "SELECT * FROM tsm_reg_families WHERE primary_email = '$email' AND campus_id = '".$campus_id."' AND website_id = '".$_SESSION['website_id']."'";
    $r = $this->db->runQuery($q);
    if (mysql_num_rows($r) > 0) {
      $a = mysql_fetch_assoc($r);
      if (TSM::getInstance()->checkPassword($a['password'], $password)) {
        $_SESSION['family']['id'] = $a['family_id'];
        $campus = new TSM_REGISTRATION_CAMPUS($campus_id);
        $this->setSelectedSchoolYear($campus->getCurrentSchoolYear());
        header("location: index.php");
        $success = 1;
      } else {
        $success = 0;
      }
    } else {
      $success = 0;
    }

    return $success;
  }

  public function getLatestStudent() {
    $q = "SELECT s.student_id FROM tsm_reg_students s, tsm_reg_students_school_years sy WHERE sy.student_id = s.student_id AND sy.school_year = '".$this->getSelectedSchoolYear()."' AND s.family_id = '".$this->familyId."' ORDER BY sy.registration_time DESC LIMIT 1";
    $r = $this->db->runQuery($q);
    while ($a = mysql_fetch_assoc($r)) {
      $student_id = $a['student_id'];
    }

    return $student_id;
  }

  public function inSchoolYear($school_year) {
    $q = "SELECT * FROM tsm_reg_families_school_years WHERE family_id = ".$this->familyId." AND school_year = '".$school_year."'";
    $r = $this->db->runQuery($q);
    if (mysql_num_rows($r) == 0) {
      return false;
    } else {
      return true;
    }
  }

  public function isLoggedIn() {
    if (isset($_SESSION['family']['id'])) {
      $this->isLoggedIn = true;
    } else {
      $this->isLoggedIn = false;
    }

    return $this->isLoggedIn;
  }

  public function getInfo() {
    if ($this->info == null) {
      $q = "SELECT * FROM tsm_reg_families WHERE family_id = ".$this->familyId;
      $r = $this->db->runQuery($q);
      while ($a = mysql_fetch_assoc($r)) {
        $this->info = $a;
      }
    }

    return $this->info;
  }

  public function getSchoolYearInfo($school_year = null) {
    if ($school_year != null) {
      $q = "SELECT * FROM tsm_reg_families_school_years fsy WHERE fsy.family_id = '".$this->familyId."' AND fsy.school_year = '".$school_year."'";
    } else {
      $q = "SELECT * FROM tsm_reg_families_school_years fsy WHERE fsy.family_id = '".$this->familyId."' AND fsy.school_year = '".$this->getSelectedSchoolYear()."'";
    }
    $r = $this->db->runQuery($q);
    while ($a = mysql_fetch_assoc($r)) {
      $this->schoolYearInfo = $a;
    }

    return $this->schoolYearInfo;
  }

  public function getStudents($school_year = null) {
    $q = "SELECT * FROM tsm_reg_students s, tsm_reg_students_school_years ssy WHERE ssy.student_id = s.student_id AND ssy.school_year = '".$school_year."' AND s.family_id = ".$this->familyId." ORDER BY s.last_name";
    $r = $this->db->runQuery($q);
    $this->students = null;
    while ($a = mysql_fetch_assoc($r)) {
      $this->students[$a['student_id']] = $a;
    }

    return $this->students;
  }

  public function getPaymentPlans($payment_plan_type_id = null) {
    $q = "SELECT pp.*, fpp.payment_plan_type_id, fpp.name, fpp.immediate_invoice_percentage, fpp.fee_type_id AS payment_plan_fee_type_id
    FROM tsm_reg_families_payment_plans pp, tsm_reg_fee_payment_plans fpp
    WHERE fpp.payment_plan_id = pp.payment_plan_id
    AND pp.family_id = '".$this->familyId."'
    AND pp.school_year = '".$this->getSelectedSchoolYear()."'";
    if (isset($payment_plan_type_id)) {
      $q .= " AND fpp.payment_plan_type_id = '$payment_plan_type_id'";
    }

    $r = $this->db->runQuery($q);
    $paymentPlans = Array();
    while ($a = mysql_fetch_assoc($r)) {
      $paymentPlans[$a['family_payment_plan_id']] = $a;
      $paymentPlans[$a['family_payment_plan_id']]['fee_types'] = unserialize($a['fee_types']);
      //$paymentPlans[$a['family_payment_plan_id']]['setup_complete'] = $a['setup_complete'];
    }

    return $paymentPlans;
  }

  public function completePaymentPlanSetup($family_payment_plan_id) {
    $q = "UPDATE tsm_reg_families_payment_plans SET setup_complete = 1 WHERE family_payment_plan_id = '$family_payment_plan_id' AND family_id = '".$this->familyId."'";
    $this->db->runQuery($q);

    return true;
  }

  public function deletePaymentPlans() {
    $q = "DELETE FROM tsm_reg_families_payment_plans WHERE family_id = '".$this->familyId."' AND school_year = '".$this->getSelectedSchoolYear()."'";
    $this->db->runQuery($q);

    return true;
  }

  public function acceptDisclaimer($family_payment_plan_id) {
    $q = "UPDATE tsm_reg_families_payment_plans SET accept_disclaimer = '1' WHERE family_payment_plan_id = '".$family_payment_plan_id."'";
    $this->db->runQuery($q);
  }

  public function savePaymentPlans() {
    if ($this->deletePaymentPlans()) {
      $paymentPlans = null;
      //print_r($_POST);
      foreach ($_POST as $key => $value) {
        if ($value != "") {
          if (strstr($key, 'payment_plan_id_for_fee_type_id')) {
            $payment_plan_id = $value;
            if (!isset($paymentPlans[$payment_plan_id])) {
              $paymentPlans[$payment_plan_id] = Array();
            }
            $array = explode(":", $key);
            $fee_type_id = $array[1];
            array_push($paymentPlans[$payment_plan_id], $fee_type_id);


            //$family_payment_plan_id = $this->db->insertRowFromPost("tsm_reg_families_payment_plans");
          }
        } else {
          $error = true;
          break;
        }
      }

      foreach ($paymentPlans as $payment_plan_id => $feeTypes) {
        $paymentPlans[$payment_plan_id] = serialize($feeTypes);
        $q = "INSERT INTO tsm_reg_families_payment_plans (family_id,payment_plan_id,fee_types,school_year)
        VALUES ('".$this->familyId."','$payment_plan_id','".$paymentPlans[$payment_plan_id]."','".$this->getSelectedSchoolYear()."')";
        $this->db->runQuery($q);
      }
    }

    if (!isset($error)) {
      return true;
    } else {
      return false;
    }

  }

  public function addFee($name, $amount, $fee_id = null) {
    if ($fee_id == null) {
      $q = "INSERT INTO tsm_reg_families_fees (family_id,name,amount,school_year) VALUES('".$this->familyId."','$name','$amount','".$this->getSelectedSchoolYear()."')";
    } else {
      $q = "INSERT INTO tsm_reg_families_fees (family_id,name,amount,fee_id,school_year) VALUES('".$this->familyId."','$name','$amount','$fee_id','".$this->getSelectedSchoolYear()."')";
    }
    $this->db->runQuery($q);
    $id = mysql_insert_id($this->db->conn);

    return $id;
  }

  public function getInvoices() {
    $q = "SELECT * FROM tsm_reg_families_invoices fi, tsm_reg_families_payment_plans fpp, tsm_reg_fee_payment_plans pp
    WHERE fi.family_payment_plan_id = fpp.family_payment_plan_id
    AND pp.payment_plan_id = fpp.payment_plan_id
    AND fi.family_id = '".$this->familyId."'";
    $r = $this->db->runQuery($q);
    $returnInvoices = null;
    while ($a = mysql_fetch_assoc($r)) {
      $returnInvoices[$a['family_invoice_id']] = $a;
    }

    return $returnInvoices;
  }

  public function getInvoicesByPaymentPlan($family_payment_plan_id) {
    $q = "SELECT * FROM tsm_reg_families_invoices
    WHERE family_payment_plan_id = '".$family_payment_plan_id."'
    AND family_id = '".$this->familyId."'
    ORDER BY family_invoice_id ASC";
    $r = $this->db->runQuery($q);
    $returnInvoices = null;
    while ($a = mysql_fetch_assoc($r)) {
      $returnInvoices[] = $a;
    }

    return $returnInvoices;
  }

  public function inQuickbooks() {
    $inQuickbooks = $this->getQuickbooksCustomerId();
    if (isset($inQuickbooks)) {
      $inQuickbooks = true;
    } else {
      $inQuickbooks = false;
    }

    return $inQuickbooks;
  }

  public function setQuickbooksCustomerId($quickbooks_customer_id) {
    $q = "UPDATE tsm_reg_families SET quickbooks_customer_id = '$quickbooks_customer_id' WHERE family_id = '".$this->familyId."'";
    $this->db->runQuery($q);

    return true;
  }

  public function getQuickbooksCustomerId() {
    $q = "SELECT quickbooks_customer_id FROM tsm_reg_families WHERE family_id = '".$this->familyId."'";
    $r = $this->db->runQuery($q);
    $quickbooks_customer_id = null;
    while ($a = mysql_fetch_assoc($r)) {
      $quickbooks_customer_id = $a['quickbooks_customer_id'];
    }

    return $quickbooks_customer_id;
  }

  public function createInvoice($family_payment_plan_id = null) {
    $q = "INSERT INTO tsm_reg_families_invoices (family_id,family_payment_plan_id) VALUES('".$this->familyId."','$family_payment_plan_id')";
    $this->db->runQuery($q);
    $invoice_id = mysql_insert_id($this->db->conn);

    //If the campus uses quickbooks, we have to create the invoice in quickbooks as well.
    $campus = new TSM_REGISTRATION_CAMPUS($this->getCurrentCampusId());
    if ($campus->usesQuickbooks() == true) {
      /*
      global $quickbooks;
      $invoice = new QuickBooks_IPP_Object_Invoice();
      $invoiceHeader = new QuickBooks_IPP_Object_Header();
      $invoiceHeader->setCustomerId($this->info['quickbooks_customer_id']);

      $invoice->addHeader($invoiceHeader);
      $Line = new QuickBooks_IPP_Object_Line();
      $Line->setItemId('{QB-162}');
      $Line->setQty(1);
      //$Line->setOverrideItemAccountName("test");

      $invoice->addLine($Line);

      $service = new QuickBooks_IPP_Service_Invoice();
      $service->add($quickbooks->Context,$quickbooks->creds['qb_realm'],$invoice);
      */
    }

    return $invoice_id;
  }

  public function recordFee($fee) {

  }

  public function sendRegistrationConfirmation() {
    $campus = new TSM_REGISTRATION_CAMPUS($this->info['campus_id']);
    $campusInfo = $campus->getInfo();
    $subject = $campusInfo['name']." Registration Confirmation";

    $headers = "From: noreply@artiosacademies.com\r\n";
    //$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $message = $campusInfo['registration_confirmation_email'];
    /*
    $message = "
    <h3>Registration Confirmation</h3>
    <p>You have successfully registered for ".$campusInfo['name']."!</p>
    <p>You can view your registration summary anytime by logging in to the registration portal</p>
    <p style='text-align: center'><a href='http://sandbox.takesixmedia.com/' target='_blank'>View Summary</a></p>
    <br /><br />
    ";
*/
    mail($this->info['primary_email'], $subject, $message, $headers);
  }

  public function getFees($fee_type_id = null) {
    $students = $this->getStudents($this->getSelectedSchoolYear());
    $returnFees = null;
    if (isset($students)) {
      foreach ($students as $student) {
        $studentObject = new TSM_REGISTRATION_STUDENT($student['student_id']);
        $fees = $studentObject->getFees($fee_type_id);
        if (isset($fees)) {
          foreach ($fees as $fee) {
            $fee['student_id'] = $student['student_id'];
            $returnFees[] = $fee;
          }
        }
      }
    }

    return $returnFees;
  }

}

?>