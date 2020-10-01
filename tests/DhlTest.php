<?php

use Petschko\DHL\Receiver;
use Petschko\DHL\Sender;
use Petschko\DHL\Service;
use Petschko\DHL\ShipmentDetails;
use PHPUnit\Framework\TestCase;

abstract class DhlTest extends TestCase
{

	protected function exampleSender()
	{
		$sender = new Sender();
		$sender->setName('Auto-Leebmann GmbH');
		$sender->setStreetName('Traminer Straße');
		$sender->setStreetNumber('1');
		$sender->setZip('94036');
		$sender->setCity('Passau');
		$sender->setProvince('Bayern'); // You can set a Province here whenever you need it (since 3.0)
		$sender->setCountry('Germany');
		$sender->setCountryISOCode('DE');
		return $sender;
	}

	protected function exampleReceiver()
	{
		$receiver = new Receiver();
		$receiver->setName('Bernhard Schönberger');
		$receiver->setStreetName('Innstadtkellerweg');
		$receiver->setStreetNumber('11');
		$receiver->setZip('94032');
		$receiver->setCity('Passau');
		$receiver->setProvince('Bayern'); // You can set a Province here whenever you need it (since 3.0)
		$receiver->setCountry('Germany');
		$receiver->setCountryISOCode('DE');
		return $receiver;
	}

	protected function exampleShipmentDetails($ekp)
	{
		$shipmentDetails = new ShipmentDetails($ekp . '6201'); // Create a Shipment-Details with the first 10 digits of your EKP-Number and 0101 (?)
		$shipmentDetails->setShipmentDate('2020-10-02'); // Optional: Need to be in the future and NOT on a sunday | null or drop it, to use today
		$shipmentDetails->setNotificationEmail('mail@inform.me'); // Needed if you want inform the receiver via mail
		$shipmentDetails->setService(new Service()); // Optional, just needed if you add some services
		$shipmentDetails->setProduct("V62WP");
		$shipmentDetails->setWeight(0.5);
		return $shipmentDetails;
	}

}
