<?php

/**
 * Schema object for: InvoiceModRq
 *
 * @author "Keith Palmer Jr." <Keith@ConsoliByte.com>
 * @license LICENSE.txt
 *
 * @package QuickBooks
 * @subpackage QBXML
 */

/**
 *
 */
require_once 'QuickBooks.php';

/**
 *
 */
require_once 'QuickBooks/QBXML/Schema/Object.php';

/**
 *
 */
class QuickBooks_QBXML_Schema_Object_InvoiceModRq extends QuickBooks_QBXML_Schema_Object {
  protected function &_qbxmlWrapper() {
    static $wrapper = 'InvoiceMod';

    return $wrapper;
  }

  protected function &_dataTypePaths() {
    static $paths = array(
      'TxnID' => 'IDTYPE',
      'EditSequence' => 'STRTYPE',
      'CustomerRef ListID' => 'IDTYPE',
      'CustomerRef FullName' => 'STRTYPE',
      'ClassRef ListID' => 'IDTYPE',
      'ClassRef FullName' => 'STRTYPE',
      'ARAccountRef ListID' => 'IDTYPE',
      'ARAccountRef FullName' => 'STRTYPE',
      'TemplateRef ListID' => 'IDTYPE',
      'TemplateRef FullName' => 'STRTYPE',
      'TxnDate' => 'DATETYPE',
      'RefNumber' => 'STRTYPE',
      'BillAddress Addr1' => 'STRTYPE',
      'BillAddress Addr2' => 'STRTYPE',
      'BillAddress Addr3' => 'STRTYPE',
      'BillAddress Addr4' => 'STRTYPE',
      'BillAddress Addr5' => 'STRTYPE',
      'BillAddress City' => 'STRTYPE',
      'BillAddress State' => 'STRTYPE',
      'BillAddress PostalCode' => 'STRTYPE',
      'BillAddress Country' => 'STRTYPE',
      'BillAddress Note' => 'STRTYPE',
      'ShipAddress Addr1' => 'STRTYPE',
      'ShipAddress Addr2' => 'STRTYPE',
      'ShipAddress Addr3' => 'STRTYPE',
      'ShipAddress Addr4' => 'STRTYPE',
      'ShipAddress Addr5' => 'STRTYPE',
      'ShipAddress City' => 'STRTYPE',
      'ShipAddress State' => 'STRTYPE',
      'ShipAddress PostalCode' => 'STRTYPE',
      'ShipAddress Country' => 'STRTYPE',
      'ShipAddress Note' => 'STRTYPE',
      'IsPending' => 'BOOLTYPE',
      'PONumber' => 'STRTYPE',
      'TermsRef ListID' => 'IDTYPE',
      'TermsRef FullName' => 'STRTYPE',
      'DueDate' => 'DATETYPE',
      'SalesRepRef ListID' => 'IDTYPE',
      'SalesRepRef FullName' => 'STRTYPE',
      'FOB' => 'STRTYPE',
      'ShipDate' => 'DATETYPE',
      'ShipMethodRef ListID' => 'IDTYPE',
      'ShipMethodRef FullName' => 'STRTYPE',
      'ItemSalesTaxRef ListID' => 'IDTYPE',
      'ItemSalesTaxRef FullName' => 'STRTYPE',
      'Memo' => 'STRTYPE',
      'CustomerMsgRef ListID' => 'IDTYPE',
      'CustomerMsgRef FullName' => 'STRTYPE',
      'IsToBePrinted' => 'BOOLTYPE',
      'IsToBeEmailed' => 'BOOLTYPE',
      'IsTaxIncluded' => 'BOOLTYPE',
      'CustomerSalesTaxCodeRef ListID' => 'IDTYPE',
      'CustomerSalesTaxCodeRef FullName' => 'STRTYPE',
      'Other' => 'STRTYPE',
      'InvoiceLineMod TxnLineID' => 'IDTYPE',
      'InvoiceLineMod ItemRef ListID' => 'IDTYPE',
      'InvoiceLineMod ItemRef FullName' => 'STRTYPE',
      'InvoiceLineMod Desc' => 'STRTYPE',
      'InvoiceLineMod Quantity' => 'QUANTYPE',
      'InvoiceLineMod UnitOfMeasure' => 'STRTYPE',
      'InvoiceLineMod OverrideUOMSetRef ListID' => 'IDTYPE',
      'InvoiceLineMod OverrideUOMSetRef FullName' => 'STRTYPE',
      'InvoiceLineMod Rate' => 'PRICETYPE',
      'InvoiceLineMod RatePercent' => 'PERCENTTYPE',
      'InvoiceLineMod PriceLevelRef ListID' => 'IDTYPE',
      'InvoiceLineMod PriceLevelRef FullName' => 'STRTYPE',
      'InvoiceLineMod ClassRef ListID' => 'IDTYPE',
      'InvoiceLineMod ClassRef FullName' => 'STRTYPE',
      'InvoiceLineMod Amount' => 'AMTTYPE',
      'InvoiceLineMod InventorySiteRef ListID' => 'IDTYPE',
      'InvoiceLineMod InventorySiteRef FullName' => 'STRTYPE',
      'InvoiceLineMod ServiceDate' => 'DATETYPE',
      'InvoiceLineMod SalesTaxCodeRef ListID' => 'IDTYPE',
      'InvoiceLineMod SalesTaxCodeRef FullName' => 'STRTYPE',
      'InvoiceLineMod OverrideItemAccountRef ListID' => 'IDTYPE',
      'InvoiceLineMod OverrideItemAccountRef FullName' => 'STRTYPE',
      'InvoiceLineMod Other1' => 'STRTYPE',
      'InvoiceLineMod Other2' => 'STRTYPE',
      'InvoiceLineGroupMod TxnLineID' => 'IDTYPE',
      'InvoiceLineGroupMod ItemGroupRef ListID' => 'IDTYPE',
      'InvoiceLineGroupMod ItemGroupRef FullName' => 'STRTYPE',
      'InvoiceLineGroupMod Quantity' => 'QUANTYPE',
      'InvoiceLineGroupMod UnitOfMeasure' => 'STRTYPE',
      'InvoiceLineGroupMod OverrideUOMSetRef ListID' => 'IDTYPE',
      'InvoiceLineGroupMod OverrideUOMSetRef FullName' => 'STRTYPE',
      'InvoiceLineGroupMod InvoiceLineMod TxnLineID' => 'IDTYPE',
      'InvoiceLineGroupMod InvoiceLineMod ItemRef ListID' => 'IDTYPE',
      'InvoiceLineGroupMod InvoiceLineMod ItemRef FullName' => 'STRTYPE',
      'InvoiceLineGroupMod InvoiceLineMod Desc' => 'STRTYPE',
      'InvoiceLineGroupMod InvoiceLineMod Quantity' => 'QUANTYPE',
      'InvoiceLineGroupMod InvoiceLineMod UnitOfMeasure' => 'STRTYPE',
      'InvoiceLineGroupMod InvoiceLineMod OverrideUOMSetRef ListID' => 'IDTYPE',
      'InvoiceLineGroupMod InvoiceLineMod OverrideUOMSetRef FullName' => 'STRTYPE',
      'InvoiceLineGroupMod InvoiceLineMod Rate' => 'PRICETYPE',
      'InvoiceLineGroupMod InvoiceLineMod RatePercent' => 'PERCENTTYPE',
      'InvoiceLineGroupMod InvoiceLineMod PriceLevelRef ListID' => 'IDTYPE',
      'InvoiceLineGroupMod InvoiceLineMod PriceLevelRef FullName' => 'STRTYPE',
      'InvoiceLineGroupMod InvoiceLineMod ClassRef ListID' => 'IDTYPE',
      'InvoiceLineGroupMod InvoiceLineMod ClassRef FullName' => 'STRTYPE',
      'InvoiceLineGroupMod InvoiceLineMod Amount' => 'AMTTYPE',
      'InvoiceLineGroupMod InvoiceLineMod ServiceDate' => 'DATETYPE',
      'InvoiceLineGroupMod InvoiceLineMod SalesTaxCodeRef ListID' => 'IDTYPE',
      'InvoiceLineGroupMod InvoiceLineMod SalesTaxCodeRef FullName' => 'STRTYPE',
      'InvoiceLineGroupMod InvoiceLineMod OverrideItemAccountRef ListID' => 'IDTYPE',
      'InvoiceLineGroupMod InvoiceLineMod OverrideItemAccountRef FullName' => 'STRTYPE',
      'InvoiceLineGroupMod InvoiceLineMod Other1' => 'STRTYPE',
      'InvoiceLineGroupMod InvoiceLineMod Other2' => 'STRTYPE',
      'IncludeRetElement' => 'STRTYPE',
    );

    return $paths;
  }

  protected function &_maxLengthPaths() {
    static $paths = array(
      'TxnID' => 0,
      'EditSequence' => 16,
      'CustomerRef ListID' => 0,
      'CustomerRef FullName' => 209,
      'ClassRef ListID' => 0,
      'ClassRef FullName' => 209,
      'ARAccountRef ListID' => 0,
      'ARAccountRef FullName' => 209,
      'TemplateRef ListID' => 0,
      'TemplateRef FullName' => 209,
      'TxnDate' => 0,
      'RefNumber' => 11,
      'BillAddress Addr1' => 41,
      'BillAddress Addr2' => 41,
      'BillAddress Addr3' => 41,
      'BillAddress Addr4' => 41,
      'BillAddress Addr5' => 41,
      'BillAddress City' => 31,
      'BillAddress State' => 21,
      'BillAddress PostalCode' => 13,
      'BillAddress Country' => 31,
      'BillAddress Note' => 41,
      'ShipAddress Addr1' => 41,
      'ShipAddress Addr2' => 41,
      'ShipAddress Addr3' => 41,
      'ShipAddress Addr4' => 41,
      'ShipAddress Addr5' => 41,
      'ShipAddress City' => 31,
      'ShipAddress State' => 21,
      'ShipAddress PostalCode' => 13,
      'ShipAddress Country' => 31,
      'ShipAddress Note' => 41,
      'IsPending' => 0,
      'PONumber' => 25,
      'TermsRef ListID' => 0,
      'TermsRef FullName' => 209,
      'DueDate' => 0,
      'SalesRepRef ListID' => 0,
      'SalesRepRef FullName' => 209,
      'FOB' => 13,
      'ShipDate' => 0,
      'ShipMethodRef ListID' => 0,
      'ShipMethodRef FullName' => 209,
      'ItemSalesTaxRef ListID' => 0,
      'ItemSalesTaxRef FullName' => 209,
      'Memo' => 4095,
      'CustomerMsgRef ListID' => 0,
      'CustomerMsgRef FullName' => 209,
      'IsToBePrinted' => 0,
      'IsToBeEmailed' => 0,
      'IsTaxIncluded' => 0,
      'CustomerSalesTaxCodeRef ListID' => 0,
      'CustomerSalesTaxCodeRef FullName' => 209,
      'Other' => 29,
      'InvoiceLineMod TxnLineID' => 0,
      'InvoiceLineMod ItemRef ListID' => 0,
      'InvoiceLineMod ItemRef FullName' => 209,
      'InvoiceLineMod Desc' => 4095,
      'InvoiceLineMod Quantity' => 0,
      'InvoiceLineMod UnitOfMeasure' => 31,
      'InvoiceLineMod OverrideUOMSetRef ListID' => 0,
      'InvoiceLineMod OverrideUOMSetRef FullName' => 209,
      'InvoiceLineMod Rate' => 0,
      'InvoiceLineMod RatePercent' => 0,
      'InvoiceLineMod PriceLevelRef ListID' => 0,
      'InvoiceLineMod PriceLevelRef FullName' => 209,
      'InvoiceLineMod ClassRef ListID' => 0,
      'InvoiceLineMod ClassRef FullName' => 209,
      'InvoiceLineMod Amount' => 0,
      'InvoiceLineMod InventorySiteRef ListID' => 0,
      'InvoiceLineMod InventorySiteRef FullName' => 209,
      'InvoiceLineMod ServiceDate' => 0,
      'InvoiceLineMod SalesTaxCodeRef ListID' => 0,
      'InvoiceLineMod SalesTaxCodeRef FullName' => 209,
      'InvoiceLineMod OverrideItemAccountRef ListID' => 0,
      'InvoiceLineMod OverrideItemAccountRef FullName' => 209,
      'InvoiceLineMod Other1' => 29,
      'InvoiceLineMod Other2' => 29,
      'InvoiceLineGroupMod TxnLineID' => 0,
      'InvoiceLineGroupMod ItemGroupRef ListID' => 0,
      'InvoiceLineGroupMod ItemGroupRef FullName' => 209,
      'InvoiceLineGroupMod Quantity' => 0,
      'InvoiceLineGroupMod UnitOfMeasure' => 31,
      'InvoiceLineGroupMod OverrideUOMSetRef ListID' => 0,
      'InvoiceLineGroupMod OverrideUOMSetRef FullName' => 209,
      'InvoiceLineGroupMod InvoiceLineMod TxnLineID' => 0,
      'InvoiceLineGroupMod InvoiceLineMod ItemRef ListID' => 0,
      'InvoiceLineGroupMod InvoiceLineMod ItemRef FullName' => 209,
      'InvoiceLineGroupMod InvoiceLineMod Desc' => 4095,
      'InvoiceLineGroupMod InvoiceLineMod Quantity' => 0,
      'InvoiceLineGroupMod InvoiceLineMod UnitOfMeasure' => 31,
      'InvoiceLineGroupMod InvoiceLineMod OverrideUOMSetRef ListID' => 0,
      'InvoiceLineGroupMod InvoiceLineMod OverrideUOMSetRef FullName' => 209,
      'InvoiceLineGroupMod InvoiceLineMod Rate' => 0,
      'InvoiceLineGroupMod InvoiceLineMod RatePercent' => 0,
      'InvoiceLineGroupMod InvoiceLineMod PriceLevelRef ListID' => 0,
      'InvoiceLineGroupMod InvoiceLineMod PriceLevelRef FullName' => 209,
      'InvoiceLineGroupMod InvoiceLineMod ClassRef ListID' => 0,
      'InvoiceLineGroupMod InvoiceLineMod ClassRef FullName' => 209,
      'InvoiceLineGroupMod InvoiceLineMod Amount' => 0,
      'InvoiceLineGroupMod InvoiceLineMod ServiceDate' => 0,
      'InvoiceLineGroupMod InvoiceLineMod SalesTaxCodeRef ListID' => 0,
      'InvoiceLineGroupMod InvoiceLineMod SalesTaxCodeRef FullName' => 209,
      'InvoiceLineGroupMod InvoiceLineMod OverrideItemAccountRef ListID' => 0,
      'InvoiceLineGroupMod InvoiceLineMod OverrideItemAccountRef FullName' => 209,
      'InvoiceLineGroupMod InvoiceLineMod Other1' => 29,
      'InvoiceLineGroupMod InvoiceLineMod Other2' => 29,
      'IncludeRetElement' => 50,
    );

    return $paths;
  }

  protected function &_isOptionalPaths() {
    static $paths = array(
      'TxnID' => false,
      'EditSequence' => false,
      'CustomerRef ListID' => true,
      'CustomerRef FullName' => true,
      'ClassRef ListID' => true,
      'ClassRef FullName' => true,
      'ARAccountRef ListID' => true,
      'ARAccountRef FullName' => true,
      'TemplateRef ListID' => true,
      'TemplateRef FullName' => true,
      'TxnDate' => true,
      'RefNumber' => true,
      'BillAddress Addr1' => true,
      'BillAddress Addr2' => true,
      'BillAddress Addr3' => true,
      'BillAddress Addr4' => true,
      'BillAddress Addr5' => true,
      'BillAddress City' => true,
      'BillAddress State' => true,
      'BillAddress PostalCode' => true,
      'BillAddress Country' => true,
      'BillAddress Note' => true,
      'ShipAddress Addr1' => true,
      'ShipAddress Addr2' => true,
      'ShipAddress Addr3' => true,
      'ShipAddress Addr4' => true,
      'ShipAddress Addr5' => true,
      'ShipAddress City' => true,
      'ShipAddress State' => true,
      'ShipAddress PostalCode' => true,
      'ShipAddress Country' => true,
      'ShipAddress Note' => true,
      'IsPending' => true,
      'PONumber' => true,
      'TermsRef ListID' => true,
      'TermsRef FullName' => true,
      'DueDate' => true,
      'SalesRepRef ListID' => true,
      'SalesRepRef FullName' => true,
      'FOB' => true,
      'ShipDate' => true,
      'ShipMethodRef ListID' => true,
      'ShipMethodRef FullName' => true,
      'ItemSalesTaxRef ListID' => true,
      'ItemSalesTaxRef FullName' => true,
      'Memo' => true,
      'CustomerMsgRef ListID' => true,
      'CustomerMsgRef FullName' => true,
      'IsToBePrinted' => true,
      'IsToBeEmailed' => true,
      'IsTaxIncluded' => true,
      'CustomerSalesTaxCodeRef ListID' => true,
      'CustomerSalesTaxCodeRef FullName' => true,
      'Other' => true,
      'InvoiceLineMod TxnLineID' => false,
      'InvoiceLineMod ItemRef ListID' => true,
      'InvoiceLineMod ItemRef FullName' => true,
      'InvoiceLineMod Desc' => true,
      'InvoiceLineMod Quantity' => true,
      'InvoiceLineMod UnitOfMeasure' => true,
      'InvoiceLineMod OverrideUOMSetRef ListID' => true,
      'InvoiceLineMod OverrideUOMSetRef FullName' => true,
      'InvoiceLineMod Rate' => false,
      'InvoiceLineMod RatePercent' => false,
      'InvoiceLineMod PriceLevelRef ListID' => true,
      'InvoiceLineMod PriceLevelRef FullName' => true,
      'InvoiceLineMod ClassRef ListID' => true,
      'InvoiceLineMod ClassRef FullName' => true,
      'InvoiceLineMod Amount' => true,
      'InvoiceLineMod InventorySiteRef ListID' => true,
      'InvoiceLineMod InventorySiteRef FullName' => true,
      'InvoiceLineMod ServiceDate' => true,
      'InvoiceLineMod SalesTaxCodeRef ListID' => true,
      'InvoiceLineMod SalesTaxCodeRef FullName' => true,
      'InvoiceLineMod OverrideItemAccountRef ListID' => true,
      'InvoiceLineMod OverrideItemAccountRef FullName' => true,
      'InvoiceLineMod Other1' => true,
      'InvoiceLineMod Other2' => true,
      'InvoiceLineGroupMod TxnLineID' => false,
      'InvoiceLineGroupMod ItemGroupRef ListID' => true,
      'InvoiceLineGroupMod ItemGroupRef FullName' => true,
      'InvoiceLineGroupMod Quantity' => true,
      'InvoiceLineGroupMod UnitOfMeasure' => true,
      'InvoiceLineGroupMod OverrideUOMSetRef ListID' => true,
      'InvoiceLineGroupMod OverrideUOMSetRef FullName' => true,
      'InvoiceLineGroupMod InvoiceLineMod TxnLineID' => false,
      'InvoiceLineGroupMod InvoiceLineMod ItemRef ListID' => true,
      'InvoiceLineGroupMod InvoiceLineMod ItemRef FullName' => true,
      'InvoiceLineGroupMod InvoiceLineMod Desc' => true,
      'InvoiceLineGroupMod InvoiceLineMod Quantity' => true,
      'InvoiceLineGroupMod InvoiceLineMod UnitOfMeasure' => true,
      'InvoiceLineGroupMod InvoiceLineMod OverrideUOMSetRef ListID' => true,
      'InvoiceLineGroupMod InvoiceLineMod OverrideUOMSetRef FullName' => true,
      'InvoiceLineGroupMod InvoiceLineMod Rate' => false,
      'InvoiceLineGroupMod InvoiceLineMod RatePercent' => false,
      'InvoiceLineGroupMod InvoiceLineMod PriceLevelRef ListID' => true,
      'InvoiceLineGroupMod InvoiceLineMod PriceLevelRef FullName' => true,
      'InvoiceLineGroupMod InvoiceLineMod ClassRef ListID' => true,
      'InvoiceLineGroupMod InvoiceLineMod ClassRef FullName' => true,
      'InvoiceLineGroupMod InvoiceLineMod Amount' => true,
      'InvoiceLineGroupMod InvoiceLineMod ServiceDate' => true,
      'InvoiceLineGroupMod InvoiceLineMod SalesTaxCodeRef ListID' => true,
      'InvoiceLineGroupMod InvoiceLineMod SalesTaxCodeRef FullName' => true,
      'InvoiceLineGroupMod InvoiceLineMod OverrideItemAccountRef ListID' => true,
      'InvoiceLineGroupMod InvoiceLineMod OverrideItemAccountRef FullName' => true,
      'InvoiceLineGroupMod InvoiceLineMod Other1' => true,
      'InvoiceLineGroupMod InvoiceLineMod Other2' => true,
      'IncludeRetElement' => true,
    );
  }

  protected function &_sinceVersionPaths() {
    static $paths = array(
      'TxnID' => 999.99,
      'EditSequence' => 999.99,
      'CustomerRef ListID' => 999.99,
      'CustomerRef FullName' => 999.99,
      'ClassRef ListID' => 999.99,
      'ClassRef FullName' => 999.99,
      'ARAccountRef ListID' => 999.99,
      'ARAccountRef FullName' => 999.99,
      'TemplateRef ListID' => 999.99,
      'TemplateRef FullName' => 999.99,
      'TxnDate' => 999.99,
      'RefNumber' => 999.99,
      'BillAddress Addr1' => 999.99,
      'BillAddress Addr2' => 999.99,
      'BillAddress Addr3' => 999.99,
      'BillAddress Addr4' => 2,
      'BillAddress Addr5' => 6,
      'BillAddress City' => 999.99,
      'BillAddress State' => 999.99,
      'BillAddress PostalCode' => 999.99,
      'BillAddress Country' => 999.99,
      'BillAddress Note' => 6,
      'ShipAddress Addr1' => 999.99,
      'ShipAddress Addr2' => 999.99,
      'ShipAddress Addr3' => 999.99,
      'ShipAddress Addr4' => 2,
      'ShipAddress Addr5' => 6,
      'ShipAddress City' => 999.99,
      'ShipAddress State' => 999.99,
      'ShipAddress PostalCode' => 999.99,
      'ShipAddress Country' => 999.99,
      'ShipAddress Note' => 6,
      'IsPending' => 999.99,
      'PONumber' => 999.99,
      'TermsRef ListID' => 999.99,
      'TermsRef FullName' => 999.99,
      'DueDate' => 999.99,
      'SalesRepRef ListID' => 999.99,
      'SalesRepRef FullName' => 999.99,
      'FOB' => 999.99,
      'ShipDate' => 999.99,
      'ShipMethodRef ListID' => 999.99,
      'ShipMethodRef FullName' => 999.99,
      'ItemSalesTaxRef ListID' => 999.99,
      'ItemSalesTaxRef FullName' => 999.99,
      'Memo' => 999.99,
      'CustomerMsgRef ListID' => 999.99,
      'CustomerMsgRef FullName' => 999.99,
      'IsToBePrinted' => 999.99,
      'IsToBeEmailed' => 6,
      'IsTaxIncluded' => 6,
      'CustomerSalesTaxCodeRef ListID' => 999.99,
      'CustomerSalesTaxCodeRef FullName' => 999.99,
      'Other' => 6,
      'InvoiceLineMod TxnLineID' => 999.99,
      'InvoiceLineMod ItemRef ListID' => 999.99,
      'InvoiceLineMod ItemRef FullName' => 999.99,
      'InvoiceLineMod Desc' => 999.99,
      'InvoiceLineMod Quantity' => 999.99,
      'InvoiceLineMod UnitOfMeasure' => 7,
      'InvoiceLineMod OverrideUOMSetRef ListID' => 999.99,
      'InvoiceLineMod OverrideUOMSetRef FullName' => 999.99,
      'InvoiceLineMod Rate' => 999.99,
      'InvoiceLineMod RatePercent' => 999.99,
      'InvoiceLineMod PriceLevelRef ListID' => 999.99,
      'InvoiceLineMod PriceLevelRef FullName' => 999.99,
      'InvoiceLineMod ClassRef ListID' => 999.99,
      'InvoiceLineMod ClassRef FullName' => 999.99,
      'InvoiceLineMod Amount' => 999.99,
      'InvoiceLineMod InventorySiteRef ListID' => 999.99,
      'InvoiceLineMod InventorySiteRef FullName' => 999.99,
      'InvoiceLineMod ServiceDate' => 999.99,
      'InvoiceLineMod SalesTaxCodeRef ListID' => 999.99,
      'InvoiceLineMod SalesTaxCodeRef FullName' => 999.99,
      'InvoiceLineMod OverrideItemAccountRef ListID' => 999.99,
      'InvoiceLineMod OverrideItemAccountRef FullName' => 999.99,
      'InvoiceLineMod Other1' => 6,
      'InvoiceLineMod Other2' => 6,
      'InvoiceLineGroupMod TxnLineID' => 999.99,
      'InvoiceLineGroupMod ItemGroupRef ListID' => 999.99,
      'InvoiceLineGroupMod ItemGroupRef FullName' => 999.99,
      'InvoiceLineGroupMod Quantity' => 999.99,
      'InvoiceLineGroupMod UnitOfMeasure' => 7,
      'InvoiceLineGroupMod OverrideUOMSetRef ListID' => 999.99,
      'InvoiceLineGroupMod OverrideUOMSetRef FullName' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod TxnLineID' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod ItemRef ListID' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod ItemRef FullName' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod Desc' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod Quantity' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod UnitOfMeasure' => 7,
      'InvoiceLineGroupMod InvoiceLineMod OverrideUOMSetRef ListID' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod OverrideUOMSetRef FullName' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod Rate' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod RatePercent' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod PriceLevelRef ListID' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod PriceLevelRef FullName' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod ClassRef ListID' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod ClassRef FullName' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod Amount' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod ServiceDate' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod SalesTaxCodeRef ListID' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod SalesTaxCodeRef FullName' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod OverrideItemAccountRef ListID' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod OverrideItemAccountRef FullName' => 999.99,
      'InvoiceLineGroupMod InvoiceLineMod Other1' => 6,
      'InvoiceLineGroupMod InvoiceLineMod Other2' => 6,
      'IncludeRetElement' => 4,
    );

    return $paths;
  }

  protected function &_isRepeatablePaths() {
    static $paths = array(
      'TxnID' => false,
      'EditSequence' => false,
      'CustomerRef ListID' => false,
      'CustomerRef FullName' => false,
      'ClassRef ListID' => false,
      'ClassRef FullName' => false,
      'ARAccountRef ListID' => false,
      'ARAccountRef FullName' => false,
      'TemplateRef ListID' => false,
      'TemplateRef FullName' => false,
      'TxnDate' => false,
      'RefNumber' => false,
      'BillAddress Addr1' => false,
      'BillAddress Addr2' => false,
      'BillAddress Addr3' => false,
      'BillAddress Addr4' => false,
      'BillAddress Addr5' => false,
      'BillAddress City' => false,
      'BillAddress State' => false,
      'BillAddress PostalCode' => false,
      'BillAddress Country' => false,
      'BillAddress Note' => false,
      'ShipAddress Addr1' => false,
      'ShipAddress Addr2' => false,
      'ShipAddress Addr3' => false,
      'ShipAddress Addr4' => false,
      'ShipAddress Addr5' => false,
      'ShipAddress City' => false,
      'ShipAddress State' => false,
      'ShipAddress PostalCode' => false,
      'ShipAddress Country' => false,
      'ShipAddress Note' => false,
      'IsPending' => false,
      'PONumber' => false,
      'TermsRef ListID' => false,
      'TermsRef FullName' => false,
      'DueDate' => false,
      'SalesRepRef ListID' => false,
      'SalesRepRef FullName' => false,
      'FOB' => false,
      'ShipDate' => false,
      'ShipMethodRef ListID' => false,
      'ShipMethodRef FullName' => false,
      'ItemSalesTaxRef ListID' => false,
      'ItemSalesTaxRef FullName' => false,
      'Memo' => false,
      'CustomerMsgRef ListID' => false,
      'CustomerMsgRef FullName' => false,
      'IsToBePrinted' => false,
      'IsToBeEmailed' => false,
      'IsTaxIncluded' => false,
      'CustomerSalesTaxCodeRef ListID' => false,
      'CustomerSalesTaxCodeRef FullName' => false,
      'Other' => false,
      'InvoiceLineMod TxnLineID' => false,
      'InvoiceLineMod ItemRef ListID' => false,
      'InvoiceLineMod ItemRef FullName' => false,
      'InvoiceLineMod Desc' => false,
      'InvoiceLineMod Quantity' => false,
      'InvoiceLineMod UnitOfMeasure' => false,
      'InvoiceLineMod OverrideUOMSetRef ListID' => false,
      'InvoiceLineMod OverrideUOMSetRef FullName' => false,
      'InvoiceLineMod Rate' => false,
      'InvoiceLineMod RatePercent' => false,
      'InvoiceLineMod PriceLevelRef ListID' => false,
      'InvoiceLineMod PriceLevelRef FullName' => false,
      'InvoiceLineMod ClassRef ListID' => false,
      'InvoiceLineMod ClassRef FullName' => false,
      'InvoiceLineMod Amount' => false,
      'InvoiceLineMod InventorySiteRef ListID' => false,
      'InvoiceLineMod InventorySiteRef FullName' => false,
      'InvoiceLineMod ServiceDate' => false,
      'InvoiceLineMod SalesTaxCodeRef ListID' => false,
      'InvoiceLineMod SalesTaxCodeRef FullName' => false,
      'InvoiceLineMod OverrideItemAccountRef ListID' => false,
      'InvoiceLineMod OverrideItemAccountRef FullName' => false,
      'InvoiceLineMod Other1' => false,
      'InvoiceLineMod Other2' => false,
      'InvoiceLineGroupMod TxnLineID' => false,
      'InvoiceLineGroupMod ItemGroupRef ListID' => false,
      'InvoiceLineGroupMod ItemGroupRef FullName' => false,
      'InvoiceLineGroupMod Quantity' => false,
      'InvoiceLineGroupMod UnitOfMeasure' => false,
      'InvoiceLineGroupMod OverrideUOMSetRef ListID' => false,
      'InvoiceLineGroupMod OverrideUOMSetRef FullName' => false,
      'InvoiceLineGroupMod InvoiceLineMod TxnLineID' => false,
      'InvoiceLineGroupMod InvoiceLineMod ItemRef ListID' => false,
      'InvoiceLineGroupMod InvoiceLineMod ItemRef FullName' => false,
      'InvoiceLineGroupMod InvoiceLineMod Desc' => false,
      'InvoiceLineGroupMod InvoiceLineMod Quantity' => false,
      'InvoiceLineGroupMod InvoiceLineMod UnitOfMeasure' => false,
      'InvoiceLineGroupMod InvoiceLineMod OverrideUOMSetRef ListID' => false,
      'InvoiceLineGroupMod InvoiceLineMod OverrideUOMSetRef FullName' => false,
      'InvoiceLineGroupMod InvoiceLineMod Rate' => false,
      'InvoiceLineGroupMod InvoiceLineMod RatePercent' => false,
      'InvoiceLineGroupMod InvoiceLineMod PriceLevelRef ListID' => false,
      'InvoiceLineGroupMod InvoiceLineMod PriceLevelRef FullName' => false,
      'InvoiceLineGroupMod InvoiceLineMod ClassRef ListID' => false,
      'InvoiceLineGroupMod InvoiceLineMod ClassRef FullName' => false,
      'InvoiceLineGroupMod InvoiceLineMod Amount' => false,
      'InvoiceLineGroupMod InvoiceLineMod ServiceDate' => false,
      'InvoiceLineGroupMod InvoiceLineMod SalesTaxCodeRef ListID' => false,
      'InvoiceLineGroupMod InvoiceLineMod SalesTaxCodeRef FullName' => false,
      'InvoiceLineGroupMod InvoiceLineMod OverrideItemAccountRef ListID' => false,
      'InvoiceLineGroupMod InvoiceLineMod OverrideItemAccountRef FullName' => false,
      'InvoiceLineGroupMod InvoiceLineMod Other1' => false,
      'InvoiceLineGroupMod InvoiceLineMod Other2' => false,
      'IncludeRetElement' => true,
    );

    return $paths;
  }

  /*
  abstract protected function &_inLocalePaths()
  {
    static $paths = array(
      'FirstName' => array( 'QBD', 'QBCA', 'QBUK', 'QBAU' ),
      'LastName' => array( 'QBD', 'QBCA', 'QBUK', 'QBAU' ),
      );

    return $paths;
  }
  */

  protected function &_reorderPathsPaths() {
    static $paths = array(
      'TxnID',
      'EditSequence',
      'CustomerRef ListID',
      'CustomerRef FullName',
      'ClassRef ListID',
      'ClassRef FullName',
      'ARAccountRef ListID',
      'ARAccountRef FullName',
      'TemplateRef ListID',
      'TemplateRef FullName',
      'TxnDate',
      'RefNumber',
      'BillAddress Addr1',
      'BillAddress Addr2',
      'BillAddress Addr3',
      'BillAddress Addr4',
      'BillAddress Addr5',
      'BillAddress City',
      'BillAddress State',
      'BillAddress PostalCode',
      'BillAddress Country',
      'BillAddress Note',
      'ShipAddress Addr1',
      'ShipAddress Addr2',
      'ShipAddress Addr3',
      'ShipAddress Addr4',
      'ShipAddress Addr5',
      'ShipAddress City',
      'ShipAddress State',
      'ShipAddress PostalCode',
      'ShipAddress Country',
      'ShipAddress Note',
      'IsPending',
      'PONumber',
      'TermsRef ListID',
      'TermsRef FullName',
      'DueDate',
      'SalesRepRef ListID',
      'SalesRepRef FullName',
      'FOB',
      'ShipDate',
      'ShipMethodRef ListID',
      'ShipMethodRef FullName',
      'ItemSalesTaxRef ListID',
      'ItemSalesTaxRef FullName',
      'Memo',
      'CustomerMsgRef ListID',
      'CustomerMsgRef FullName',
      'IsToBePrinted',
      'IsToBeEmailed',
      'IsTaxIncluded',
      'CustomerSalesTaxCodeRef ListID',
      'CustomerSalesTaxCodeRef FullName',
      'Other',
      'InvoiceLineMod TxnLineID',
      'InvoiceLineMod ItemRef ListID',
      'InvoiceLineMod ItemRef FullName',
      'InvoiceLineMod Desc',
      'InvoiceLineMod Quantity',
      'InvoiceLineMod UnitOfMeasure',
      'InvoiceLineMod OverrideUOMSetRef ListID',
      'InvoiceLineMod OverrideUOMSetRef FullName',
      'InvoiceLineMod Rate',
      'InvoiceLineMod RatePercent',
      'InvoiceLineMod PriceLevelRef ListID',
      'InvoiceLineMod PriceLevelRef FullName',
      'InvoiceLineMod ClassRef ListID',
      'InvoiceLineMod ClassRef FullName',
      'InvoiceLineMod Amount',
      'InvoiceLineMod InventorySiteRef ListID',
      'InvoiceLineMod InventorySiteRef FullName',
      'InvoiceLineMod ServiceDate',
      'InvoiceLineMod SalesTaxCodeRef ListID',
      'InvoiceLineMod SalesTaxCodeRef FullName',
      'InvoiceLineMod OverrideItemAccountRef ListID',
      'InvoiceLineMod OverrideItemAccountRef FullName',
      'InvoiceLineMod Other1',
      'InvoiceLineMod Other2',
      'InvoiceLineGroupMod TxnLineID',
      'InvoiceLineGroupMod ItemGroupRef ListID',
      'InvoiceLineGroupMod ItemGroupRef FullName',
      'InvoiceLineGroupMod Quantity',
      'InvoiceLineGroupMod UnitOfMeasure',
      'InvoiceLineGroupMod OverrideUOMSetRef ListID',
      'InvoiceLineGroupMod OverrideUOMSetRef FullName',
      'InvoiceLineGroupMod InvoiceLineMod TxnLineID',
      'InvoiceLineGroupMod InvoiceLineMod ItemRef ListID',
      'InvoiceLineGroupMod InvoiceLineMod ItemRef FullName',
      'InvoiceLineGroupMod InvoiceLineMod Desc',
      'InvoiceLineGroupMod InvoiceLineMod Quantity',
      'InvoiceLineGroupMod InvoiceLineMod UnitOfMeasure',
      'InvoiceLineGroupMod InvoiceLineMod OverrideUOMSetRef ListID',
      'InvoiceLineGroupMod InvoiceLineMod OverrideUOMSetRef FullName',
      'InvoiceLineGroupMod InvoiceLineMod Rate',
      'InvoiceLineGroupMod InvoiceLineMod RatePercent',
      'InvoiceLineGroupMod InvoiceLineMod PriceLevelRef ListID',
      'InvoiceLineGroupMod InvoiceLineMod PriceLevelRef FullName',
      'InvoiceLineGroupMod InvoiceLineMod ClassRef ListID',
      'InvoiceLineGroupMod InvoiceLineMod ClassRef FullName',
      'InvoiceLineGroupMod InvoiceLineMod Amount',
      'InvoiceLineGroupMod InvoiceLineMod ServiceDate',
      'InvoiceLineGroupMod InvoiceLineMod SalesTaxCodeRef ListID',
      'InvoiceLineGroupMod InvoiceLineMod SalesTaxCodeRef FullName',
      'InvoiceLineGroupMod InvoiceLineMod OverrideItemAccountRef ListID',
      'InvoiceLineGroupMod InvoiceLineMod OverrideItemAccountRef FullName',
      'InvoiceLineGroupMod InvoiceLineMod Other1',
      'InvoiceLineGroupMod InvoiceLineMod Other2',
      'IncludeRetElement',
    );

    return $paths;
  }
}