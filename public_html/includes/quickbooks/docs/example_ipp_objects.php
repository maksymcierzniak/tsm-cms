<?php

/**
 * Example of reading/writing data to/from Intuit Data Services
 *
 * @package QuickBooks
 * @subpackage Documentation
 */

// Output
header('Content-Type: text/plain');

// Error reporting
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

// QuickBooks library
require_once '../QuickBooks.php';

// Here's a typical qbXML response
$xml = '<?xml version="1.0" encoding="UTF-8"?><!--XML GENERATED by IntuitDataSyncEngine (IDS) using \\SBDomainServices\CDM\branches\3.0.0-rel-->
<RestResponse xmlns="http://www.intuit.com/sb/cdm/v2"
xmlns:xdb          ="http://xmlns.oracle.com/xdb"
xmlns:xsi          ="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation ="http://www.intuit.com/sb/cdm/v2 ../common/RestDataFilter.xsd"><Customers>
	<Customer>
		<Id idDomain="QB">2</Id>
		<SyncToken>1</SyncToken>
		<MetaData>
			<CreatedBy>app</CreatedBy>
			<CreateTime>2010-04-07T13:49:53.0</CreateTime>
			<LastModifiedBy>app</LastModifiedBy>
			<LastUpdatedTime>2010-04-07T13:49:53.0</LastUpdatedTime>
		</MetaData>
		<ExternalKey idDomain="QB">2</ExternalKey>
		<Synchronized>true</Synchronized>
		<PartyReferenceId idDomain="QB">2</PartyReferenceId>
		<TypeOf>Person</TypeOf>
		<Name>Test Customer 2</Name>
		<Address>
			<Id idDomain="QB">00000000000000rp</Id>
			<Line1>134 Stonemill Road</Line1>
			<Line2>Suite 2</Line2>
			<Line3>Storrs-Mansfield, CT 06279</Line3>
			<Line4>United States</Line4>
			<City>Storrs-Mansfield</City>
			<Country>USA</Country>
			<CountrySubDivisionCode>CT</CountrySubDivisionCode>
			<PostalCode>06268</PostalCode>
			<Default>1</Default>
			<Tag>Billing</Tag>
		</Address>
		<Active>true</Active>
		<ShowAs>Test Customer 2</ShowAs>
		<OpenBalance>
			<CurrencyCode>USD</CurrencyCode>
			<Amount>0</Amount>
		</OpenBalance>
	</Customer>

	<Customer>
		<Id idDomain="QB">1</Id>
		<SyncToken>1</SyncToken>
		<MetaData>
			<CreatedBy>app</CreatedBy>
			<CreateTime>2010-04-07T13:49:48.0</CreateTime>
			<LastModifiedBy>app</LastModifiedBy>
			<LastUpdatedTime>2010-04-07T14:49:24.0</LastUpdatedTime>
		</MetaData>
		<ExternalKey idDomain="QB">1</ExternalKey>
		<Synchronized>true</Synchronized>
		<PartyReferenceId idDomain="QB">1</PartyReferenceId>
		<TypeOf>Person</TypeOf>
		<Name>Test Customer 1</Name>
		<Address>
			<Id idDomain="QB">00000000000000rp</Id>
			<Line1>56 Cowles Road</Line1>
			<Line2>Suite D</Line2>
			<Line3>Willington, CT 06279</Line3>
			<Line4>United States</Line4>
			<City>Willington</City>
			<Country>USA</Country>
			<CountrySubDivisionCode>CT</CountrySubDivisionCode>
			<PostalCode>06279</PostalCode>
			<Default>1</Default>
			<Tag>Billing</Tag>
		</Address>
		<Address>
			<Id idDomain="QB">00000000000000s9</Id>
			<Line1>134 Stonemill Road</Line1>
			<Line2>Suite 42</Line2>
			<Line3>Storrs, CT 06268</Line3>
			<Line4>USA</Line4>
			<City>Storrs</City>
			<Country>USA</Country>
			<CountrySubDivisionCode>CT</CountrySubDivisionCode>
			<PostalCode>06268</PostalCode>
			<Default>1</Default>
			<Tag>Shipping</Tag>
		</Address>
		<Phone>
			<Id idDomain="QB">00000000000000rp</Id>
			<DeviceType>LandLine</DeviceType>
			<FreeFormNumber>860-634-1602</FreeFormNumber>
			<Default>1</Default>
			<Tag>Business</Tag>
		</Phone>
		<Title>Mr.</Title>
		<GivenName>Keith</GivenName>
		<FamilyName>Palmer</FamilyName>
		<DBAName>Test Customer 1, LLC</DBAName>
		<Active>true</Active>
		<ShowAs>Test Customer 1</ShowAs>
		<OpenBalance>
			<CurrencyCode>USD</CurrencyCode>
			<Amount>250</Amount>
		</OpenBalance>
		<OpenBalanceDate>2010-04-07</OpenBalanceDate>
	</Customer>

</Customers></RestResponse>';

// Here's the XML
print($xml);

// Here's our parser
$Parser = new QuickBooks_IPP_Parser();

// It's the results of a query
$optype = QuickBooks_IPP_IDS::OPTYPE_QUERY;

// Parse it into some objects
$xml_errnum = null;
$xml_errmsg = null;
$err_code = null;
$err_desc = null;
$err_db = null;
$list = $Parser->parseIDS($xml, $optype, $xml_errnum, $xml_errmsg, $err_code, $err_desc, $err_db);

// Print it out
print_r($list);

// Loop through the list of customers
foreach ($list as $Customer) {
  $line = '';
  $city = '';
  $state = '';
  if ($Address = $Customer->getAddress(0)) {
    $line = $Address->getLine1();
    $city = $Address->getCity();
    $state = $Address->getCountrySubDivisionCode();
  }

  print(''.$Customer->getName().' has an address of: '.$line.' '.$city.' '.$state."\n");
}

// Here's the last customer in the list
$Customer = end($list);


// Convert it back to XML 
print($Customer->asIDSXML()); 