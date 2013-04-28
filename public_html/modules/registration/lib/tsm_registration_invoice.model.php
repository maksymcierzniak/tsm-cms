<?php

class TSM_REGISTRATION_INVOICE extends TSM_REGISTRATION_CAMPUS {

  private $info;

  public function __construct($invoiceId = null) {
    $tsm = TSM::getInstance();
    $this->tsm = $tsm;
    $this->db = $tsm->db;
    if (isset($invoiceId)) {
      $this->invoiceId = intval($invoiceId);
      $this->getInfo();
    }
  }

  public function getInfo() {
    if ($this->info == null) {
      $q = "SELECT * FROM tsm_reg_families_invoices WHERE family_invoice_id = ".$this->invoiceId;
      $r = $this->db->runQuery($q);
      while ($a = mysql_fetch_assoc($r)) {
        $this->info = $a;
      }
    }

    return $this->info;
  }

  public function generatePDF($forEmail = false) {
    $family = new TSM_REGISTRATION_FAMILY($this->info['family_id']);
    $familyInfo = $family->getInfo();

    $campus = new TSM_REGISTRATION_CAMPUS($familyInfo['campus_id']);
    $campusInfo = $campus->getInfo();
    if($this->info['quickbooks_doc_number'] != ""){
      $invoiceNum = $this->info['quickbooks_doc_number'];
    } else {
      $invoiceNum = $this->info['family_invoice_id'];
    }

    $mpdf = new mPDF('win-1252', 'A4', '', '', 20, 15, 48, 25, 10, 10);
    $mpdf->useOnlyCoreFonts = true; // false is default
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle($familyInfo['father_last']." - Invoice");
    $mpdf->SetAuthor($campusInfo['name']);
    if ($this->getPayments()) {
      $mpdf->SetWatermarkText("Paid");
      $mpdf->showWatermarkText = true;
      $mpdf->watermark_font = 'DejaVuSansCondensed';
      $mpdf->watermarkTextAlpha = 0.1;
    }
    $mpdf->SetDisplayMode('fullpage');

    $html = '
    <html>
    <head>
    <style>
    body {font-family: sans-serif;
        font-size: 10pt;
    }
    p {    margin: 0pt;
    }
    td { vertical-align: top; }
    .items td {
        border-left: 0.1mm solid #000000;
        border-right: 0.1mm solid #000000;
    }
    table thead td { background-color: #EEEEEE;
        text-align: center;
        border: 0.1mm solid #000000;
    }
    .items td.blanktotal {
        background-color: #FFFFFF;
        border: 0mm none #000000;
        border-top: 0.1mm solid #000000;
        border-right: 0.1mm solid #000000;
    }
    .items td.totals {
        text-align: right;
        border: 0.1mm solid #000000;
    }
    </style>
    </head>
    <body>

    <!--mpdf
    <htmlpageheader name="myheader">
    <table width="100%"><tr>
    <td width="50%" style="color:#0000BB;"><span style="font-weight: bold; font-size: 14pt;">'.$campusInfo['name'].'</span><br />'.$campusInfo['payment_address_attn'].'<br />'.$campusInfo['payment_address'].' '.$campusInfo['payment_address2'].'<br />'.$campusInfo['payment_city'].', '.$campusInfo['payment_state'].' '.$campusInfo['payment_zip'].'</td>
    <td width="50%" style="text-align: right;">Invoice No.<br /><span style="font-weight: bold; font-size: 12pt;">'.$invoiceNum.'</span></td>
    </tr></table>
    </htmlpageheader>

    <htmlpagefooter name="myfooter">
    <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
    Page {PAGENO} of {nb}
    </div>
    </htmlpagefooter>

    <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
    <sethtmlpagefooter name="myfooter" value="on" />
    mpdf-->

    <div style="text-align: right; margin-top: -50px;">Date: '.date('jS F Y', strtotime($this->info['invoice_time'])).'</div>
    <br /><br />

    <table width="100%" style="font-family: serif;" cellpadding="10">
    <tr>
    <td width="45%" style="border: 0.1mm solid #888888;">
    <span style="font-size: 7pt; color: #555555; font-family: sans;">BILL TO:</span>
    <br /><br />'.$familyInfo['father_first'].' '.$familyInfo['father_last'].'
    <br />'.$familyInfo['address'].'
    <br />'.$familyInfo['city'].', '.$familyInfo['state'].' '.$familyInfo['zip'].'
    </td>
    <td width="10%">&nbsp;</td>
    <td width="45%" style="border: 0mm solid #888888;"></td>
    </tr>
    </table>
    <br /><br />


    <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse;" cellpadding="8">
    <thead>
    <tr>
    <td width="15%">REF. NO.</td>
    <td width="55%">DESCRIPTION</td>
    <td width="15%">UNIT PRICE</td>
    <td width="15%">AMOUNT</td>
    </tr>
    </thead>
    <tbody>
    <!-- ITEMS HERE -->';

    foreach ($this->getFees() as $fee) {
      $html .= '
    <tr>
    <td align="center">'.$fee['family_fee_id'].'</td>
    <td>'.$fee['description'].'</td>
    <td align="right">$'.$fee['amount'].'</td>
    <td align="right">$'.$fee['amount'].'</td>
    </tr>';
    }


    $html .= '

    <!-- END ITEMS HERE -->
    <tr>
    <td class="blanktotal" colspan="2" rowspan="6"></td>
    <td class="totals"><b>TOTAL:</b></td>
    <td class="totals"><b>$'.$this->getTotal().'</b></td>
    </tr>
    <tr>
    <td class="totals">Amount Paid:</td>
    <td class="totals">$'.$this->getAmountPaid().'</td>
    </tr>
    <tr>
    <td class="totals"><b>Balance due:</b></td>
    <td class="totals"><b>$'.$this->getAmountDue().'</b></td>
    </tr>
    </tbody>
    </table>
    <br /><br />
    <div style="text-align: center; font-style: italic;">Payment terms: payment due in 30 days</div>
    </body>
    </html>
    ';

    $mpdf->WriteHTML($html);

    if($forEmail == false){
      $mpdf->Output();
      exit;
    } else{
      $content = $mpdf->Output('','S');
      return $content;
    }
  }

  public function getPayPalFee() {
    $q = "SELECT * FROM tsm_reg_families_fees ff, tsm_reg_families_invoice_fees fif
    WHERE fif.family_fee_id = ff.family_fee_id
    AND fif.family_invoice_id = '".$this->invoiceId."'
    AND ff.name = 'PayPal Convenience Fee'";
    $r = $this->db->runQuery($q);
    $fee = null;
    while ($a = mysql_fetch_assoc($r)) {
      $fee = $a;
    }

    return $fee;
  }

  public function addPayPalFee() {
    $payPalFee = $this->getPayPalFee();
    if (!$payPalFee) {
      $total = $this->getTotal();
      $campus = new TSM_REGISTRATION_CAMPUS($this->getCurrentCampusId());
      $campusInfo = $campus->getInfo();
      $paypal_fee_id = $campusInfo['paypal_convenience_fee_id'];
      $paypalFee = new TSM_REGISTRATION_FEE($paypal_fee_id);
      $paypalFeeInfo = $paypalFee->getInfo();

      $paypalFeeAmount = $total * .03;
      $family_id = $this->info['family_id'];
      $family = new TSM_REGISTRATION_FAMILY($family_id);
      $family_fee_id = $family->addFee($paypalFeeInfo['name'], $paypalFeeAmount, $paypal_fee_id, $paypalFeeInfo['fee_type_id']);
      /* WE SHOULDN'T SET THE PAYMENT PLAN ID FOR A PAYPAL FEE BECAUSE IT COULD THROW OFF THE CALCUALTED TOTAL FOR THE PAYMENT PLAN
      $familyFee = new TSM_REGISTRATION_FAMILY_FEE($family_fee_id);
      $familyFee->setPaymentPlan($this->info['family_payment_plan_id']);
      */
      $params = Array("family_fee_id" => $family_fee_id, "description" => $paypalFeeInfo['name'], "amount" => $paypalFeeAmount);
      $this->addFee($params);
      $this->updateTotal();
      $return = true;
    } else {
      $return = true;
    }
    return $return;

  }

  public function containsFee($family_fee_id) {
    $q = "SELECT * FROM tsm_reg_families_invoice_fees WHERE family_invoice_id = '".$this->invoiceId."' AND family_fee_id = '".$family_fee_id."'";
    $r = $this->db->runQuery($q);
    if (mysql_num_rows($r) == 0) {
      return false;
    } else {
      return true;
    }
  }

  public function addFee($options = Array("family_fee_id" => null, "description" => "", "amount" => 0)) {
    if (isset($options['family_fee_id'])) {
      $family_fee_id = $options['family_fee_id'];
    } else {
      $family_fee_id = null;
    }
    if (isset($options['description'])) {
      $description = $options['description'];
    } else {
      $description = null;
    }
    if (isset($options['amount'])) {
      $amount = $options['amount'];
    } else {
      $amount = null;
    }


    if ($this->containsFee($family_fee_id) == false) {
      $q = "INSERT INTO tsm_reg_families_invoice_fees (family_id,description,amount,family_fee_id,family_invoice_id)
      VALUES('".$this->info['family_id']."','".$description."','".$amount."','$family_fee_id','".$this->invoiceId."')";
      $this->db->runQuery($q);

      return true;
    } else {
      return false;
    }
  }

  public function getPayments() {
    $q = "SELECT * FROM tsm_reg_families_payment_invoice fpi, tsm_reg_families_payments fp
    WHERE fp.family_payment_id = fpi.family_payment_id AND fpi.family_invoice_id = '".$this->invoiceId."'";
    $r = $this->db->runQuery($q);
    $payments = null;
    while ($a = mysql_fetch_assoc($r)) {
      $payments[$a['family_payment_id']] = $a;
    }

    return $payments;
  }

  public function getFees() {
    //$q = "SELECT invf.*, ff.fee_id, ff.name FROM tsm_reg_families_invoice_fees invf, tsm_reg_families_fees ff WHERE ff.family_fee_id = invf.family_fee_id AND invf.family_invoice_id = '".$this->invoiceId."'";
    $q = "SELECT invf.*, ff.fee_id, ff.name FROM tsm_reg_families_invoice_fees invf, tsm_reg_families_fees ff WHERE ff.family_fee_id = invf.family_fee_id AND invf.family_invoice_id = '".$this->invoiceId."'";

    $r = $this->db->runQuery($q);
    $returnFees = null;
    while ($a = mysql_fetch_assoc($r)) {
      $returnFees[] = $a;
    }

    return $returnFees;
  }

  public function addToQuickbooks() {
    global $quickbooks;

    $campus = new TSM_REGISTRATION_CAMPUS($this->getCurrentCampusId());
    $campusInfo = $campus->getInfo();

    $doNotProcess = false;
    $family = new TSM_REGISTRATION_FAMILY($this->info['family_id']);
    $quickbooks_customer_id = $family->getQuickbooksCustomerId();
    $invoiceTotal = $this->getTotal();

    if ($this->info['quickbooks_invoice_id'] != "") {
      $doNotProcess = true;
    }

    $fees = $this->getFees();

    $invoiceHeader = new QuickBooks_IPP_Object_Header();
    $invoiceHeader->setCustomerId($quickbooks_customer_id);
    $txnDate = date('Y-m-d', strtotime($this->info['invoice_time']));
    $invoiceHeader->setTxnDate($txnDate);
    $invoiceHeader->setNote($this->info['invoice_description']);

    if ($invoiceTotal > 0) {
      $quickbooksInvoice = new QuickBooks_IPP_Object_Invoice();
      $quickbooksInvoice->addHeader($invoiceHeader);
    } elseif ($invoiceTotal < 0) {
      $quickbooksInvoice = new QuickBooks_IPP_Object_CreditMemo();
      $creditMemoTotal = $invoiceTotal * -1;
      $invoiceHeader->setTotalAmt($creditMemoTotal);
      $invoiceHeader->setARAccountName("Accounts Receivable");
      //todo: need to set the account to whatever account the campus is set to.
      $quickbooksInvoice->addHeader($invoiceHeader);
    }

    /*
    if(isset($fees)){
      foreach ($fees as $fee) {
        $feeObject = new TSM_REGISTRATION_FEE($fee['fee_id']);
        if (isset($fee['fee_id'])) {
          $feeInfo = $feeObject->getInfo();
        }


        if (!isset($feeInfo['quickbooks_item_id'])) {
          $doNotProcess = true;
        }


      }
    }
    */

    if (!$doNotProcess) {
      if (isset($fees)) {
        foreach ($fees as $fee) {
          if (isset($fee['fee_id'])) {
            $feeObject = new TSM_REGISTRATION_FEE($fee['fee_id']);
            $feeInfo = $feeObject->getInfo();

            $Line = new QuickBooks_IPP_Object_Line();
            $Line->setItemId($feeInfo['quickbooks_item_id']);

            //we need to make the negative charge positive if this is a credit to their account.
            if ($invoiceTotal > 0) {
              $Line->setAmount($fee['amount']);
            } else {
              $Line->setAmount($fee['amount'] * -1);
            }

            $familyFee = new TSM_REGISTRATION_FAMILY_FEE($fee['family_fee_id']);
            $familyFeeInfo = $familyFee->getInfo();
            if($familyFeeInfo['student_id'] != 0){
              $student = new TSM_REGISTRATION_STUDENT($familyFeeInfo['student_id']);
              $studentInfo = $student->getInfo();
              $studentName = $studentInfo['first_name']." ".$studentInfo['last_name'].": ";
            } else {
              $studentName = null;
            }

            if($studentName != null){
              $description = $studentName.": ".$fee['name'];
            } else {
              $description = $fee['name'];
            }

            $Line->setDescription($description);
            $Line->setQty(1);
            $quickbooksInvoice->addLine($Line);
          } else {
            $Line = new QuickBooks_IPP_Object_Line();
            $Line->setAmount($fee['amount']);
            $Line->setDescription($fee['name']);
            $Line->setQty(1);
            $quickbooksInvoice->addLine($Line);
          }
        }
      }
      /*
      else {
        $Line = new QuickBooks_IPP_Object_Line();
        $Line->setAmount($creditMemoTotal);
        $Line->setDesc("Tuition Installment");
        $Line->setItemId("{QB-398}");
        $Line->setQty(1);
        $quickbooksInvoice->addLine($Line);
      }
      */

      if ($invoiceTotal > 0) {
        $service = new QuickBooks_IPP_Service_Invoice();
      } elseif ($invoiceTotal < 0) {
        $service = new QuickBooks_IPP_Service_CreditMemo();
      }
      //print_r($quickbooksInvoice);die();

      $quickbooks_id = $service->add($quickbooks->Context, $quickbooks->creds['qb_realm'], $quickbooksInvoice);
      if ($quickbooks_id == null) {
        die($service->lastResponse()."<br /><br />".$service->lastRequest());
      }
      $this->setQuickbooksId($quickbooks_id);
      $invoice = $service->findById($quickbooks->Context, $quickbooks->creds['qb_realm'], $quickbooks_id);
      $extKey = $invoice->getExternalKey();
      $this->setQuickbooksExternalKey($extKey);

      /*
      $payments = $this->getPayments();
      if (isset($payments)) {
        $txnId = $invoice->getExternalKey();
        foreach ($payments as $payment) {
          if ($payment['quickbooks_payment_id'] == "") {
            $paymentObject = new QuickBooks_IPP_Object_Payment();
            $paymentHeader = new QuickBooks_IPP_Object_Header();
            $paymentHeader->setCustomerId($quickbooks_customer_id);
            $paymentHeader->setTotalAmt($payment['amount']);
            $paymentHeader->setDocNumber($payment['reference_number']);
            $paymentHeader->setPaymentMethodId($campusInfo['qb_paypal_payment_method_id']);
            $txnDate = date('Y-m-d', strtotime($payment['payment_time']));
            $paymentHeader->setTxnDate($txnDate);
            $paymentObject->addHeader($paymentHeader);
            $Line = new QuickBooks_IPP_Object_Line();
            $Line->setTxnId($txnId);
            $Line->setAmount($payment['amount']);
            $paymentObject->addLine($Line);
            $service = new QuickBooks_IPP_Service_Payment();
            $quickbooks_payment_id = $service->add($quickbooks->Context, $quickbooks->creds['qb_realm'], $paymentObject);
            $paymentObject = new TSM_REGISTRATION_PAYMENT($payment['invoice_payment_id']);
            $paymentObject->setQuickbooksId($quickbooks_payment_id);
          }
        }
      }
      */

      return true;
    } else {
      die("doNotProcess");
      return false;
    }
  }

  public function hide() {
    $q = "UPDATE tsm_reg_families_invoices SET displayed = false WHERE family_invoice_id = '".$this->invoiceId."'";
    $this->db->runQuery($q);

    return true;
  }

  public function setQuickbooksId($id) {
    $q = "UPDATE tsm_reg_families_invoices SET quickbooks_invoice_id = '".$id."' WHERE family_invoice_id = '".$this->invoiceId."'";
    $this->db->runQuery($q);

    return true;
  }

  public function setQuickbooksExternalKey($key){
    $q = "UPDATE tsm_reg_families_invoices SET quickbooks_external_key = '".$key."' WHERE family_invoice_id = '".$this->invoiceId."'";
    $this->db->runQuery($q);

    return true;
  }

  public function setQuickbooksDocNumber($num){
    $q = "UPDATE tsm_reg_families_invoices SET quickbooks_doc_number = '".$num."' WHERE family_invoice_id = '".$this->invoiceId."'";
    $this->db->runQuery($q);

    return true;
  }

  public function getTotal() {
    $q = "SELECT amount FROM tsm_reg_families_invoices WHERE family_invoice_id = '".$this->invoiceId."'";
    $r = $this->db->runQuery($q);
    while ($a = mysql_fetch_assoc($r)) {
      $total = $a['amount'];
    }

    return $total;
  }

  public function getAmountPaid() {
    $q = "SELECT fpi.amount FROM tsm_reg_families_payments fp, tsm_reg_families_payment_invoice fpi
    WHERE fpi.family_payment_id = fp.family_payment_id
    AND fpi.family_invoice_id = '".$this->invoiceId."'";
    $r = $this->db->runQuery($q);
    $amountPaid = 0;
    bcscale(2);
    while ($a = mysql_fetch_assoc($r)) {
      $amountPaid = bcadd($amountPaid,$a['amount']);
    }

    return $amountPaid;
  }

  public function getAmountDue() {
    $q = "SELECT fpi.amount FROM tsm_reg_families_payments fp, tsm_reg_families_payment_invoice fpi
    WHERE fpi.family_payment_id = fp.family_payment_id
    AND fpi.family_invoice_id = '".$this->invoiceId."'";
    $r = $this->db->runQuery($q);
    $amountDue = $this->getTotal();
    bcscale(2);
    while ($a = mysql_fetch_assoc($r)) {
      $amountDue = bcsub($amountDue,$a['amount']);
    }

    return $amountDue;
  }

  public function updateTotal() {
    $q = "UPDATE tsm_reg_families_invoices SET amount = '".$this->addFees($this->getFees())."' WHERE family_invoice_id = '".$this->invoiceId."'";
    $this->db->runQuery($q);

    return true;
  }

}

?>