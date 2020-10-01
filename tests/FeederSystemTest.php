<?php

use Petschko\DHL\BusinessShipment;
use Petschko\DHL\Credentials;
use Petschko\DHL\ShipmentOrder;

final class FeederSystemTest extends DhlTest {

	public function testSoap() {

		$credentials = new Credentials(true);
		$credentials->setApiUser(getenv("API_USER"));			// Test-Mode: Your DHL-Dev-Account (Developer-ID NOT E-Mail!!) | Production: Your Applications-ID
		$credentials->setApiPassword(getenv("API_PASS"));

		$dhl = new BusinessShipment($credentials, true, "3.1");

		// Don't forget to assign the created objects to the ShipmentOrder Object!
		$shipmentOrder = new ShipmentOrder();
		$shipmentOrder->setSequenceNumber("1");
		$shipmentOrder->setSender($this->exampleSender());
		$shipmentOrder->setReceiver($this->exampleReceiver()); // You can set these Object-Types here: DHL_Filial, DHL_Receiver & DHL_PackStation
		$shipmentOrder->setLabelResponseType(BusinessShipment::RESPONSE_TYPE_URL);
		$shipmentOrder->setShipmentDetails($this->exampleShipmentDetails($credentials->getEkp(10)));

		$labelFormat = new \Petschko\DHL\LabelFormat();
		$labelFormat->setLabelFormat(null);
		$labelFormat->setLabelFormatRetoure(null);
		$labelFormat->setCombinedPrinting(true); // Here you can set if all labels should printed together (if you have multiple)
		$labelFormat->setGroupProfileName('groupProfileName'); // here you can set the group profile name if needed
		$labelFormat->setFeederSystem(true);

		$shipmentOrder->setLabelFormat($labelFormat);

		// Add the ShipmentOrder to the BusinessShipment Object, you can add up to 30 ShipmentOrder Objects in 1 call
		$dhl->addShipmentOrder($shipmentOrder);

		$response = $dhl->createShipment();

		var_dump($response);

		$this->assertEquals("hallo", 'hallo');
	}

}
