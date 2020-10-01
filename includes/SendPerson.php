<?php

namespace Petschko\DHL;

/**
 * Author: Peter Dragicevic [peter@petschko.org]
 * Authors-Website: https://petschko.org/
 * Date: 26.01.2017
 * Time: 18:17
 *
 * Notes: Contains SendPerson Class
 */

use stdClass;

/**
 * Class SendPerson
 *
 * @package Petschko\DHL
 */
abstract class SendPerson extends Address
{
	/**
	 * Name of the SendPerson (Can be a Company-Name too!)
	 *
	 * Min-Len: -
	 * Max-Len: 50
	 *
	 * @var string $name - Name
	 */
	private $name;

	/**
	 * Name of SendPerson (Part 2)
	 *
	 * Note: Optional
	 *
	 * Min-Len: -
	 * Max-Len: 50
	 *
	 * @var string|null $name2 - Name (Part 2) | null for none
	 */
	private $name2 = null;

	/**
	 * Name of SendPerson (Part 3)
	 *
	 * Note: Optional
	 *
	 * Min-Len: -
	 * Max-Len: 50
	 *
	 * @var string|null $name3 - Name (Part 3) | null for none
	 */
	private $name3 = null;

	/**
	 * Phone-Number of the SendPerson
	 *
	 * Note: Optional
	 *
	 * Min-Len: -
	 * Max-Len: 20
	 *
	 * @var string|null $phone - Phone-Number | null for none
	 */
	private $phone = null;

	/**
	 * E-Mail of the SendPerson
	 *
	 * Note: Optional
	 *
	 * Min-Len: -
	 * Max-Len: 70
	 * Max-Len: 50 (since 3.0)
	 *
	 * @var string|null $email - E-Mail-Address | null for none
	 */
	private $email = null;

	/**
	 * Contact Person of the SendPerson (Mostly used in Companies)
	 *
	 * Note: Optional
	 *
	 * Min-Len: -
	 * Max-Len: 50
	 *
	 * @var string|null $contactPerson - Contact Person | null for none
	 */
	private $contactPerson = null;

	/**
	 * Clears Memory
	 */
	public function __destruct()
	{
		parent::__destruct();
		unset($this->name);
		unset($this->name2);
		unset($this->name3);
		unset($this->phone);
		unset($this->email);
		unset($this->contactPerson);
	}

	/**
	 * Get the Name
	 *
	 * @return string - Name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the Name
	 *
	 * @param string $name - Name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * Get the Name2 Field
	 *
	 * @return null|string - Name2 or null if none
	 */
	public function getName2()
	{
		return $this->name2;
	}

	/**
	 * Set the Name2 Field
	 *
	 * @param null|string $name2 - Name2 or null for none
	 */
	public function setName2($name2)
	{
		$this->name2 = $name2;
	}

	/**
	 * Get the Name3 Field
	 *
	 * @return null|string - Name3 or null if none
	 */
	public function getName3()
	{
		return $this->name3;
	}

	/**
	 * Set the Name3 Field
	 *
	 * @param null|string $name3 - Name3 or null for none
	 */
	public function setName3($name3)
	{
		$this->name3 = $name3;
	}

	/**
	 * Get the Phone
	 *
	 * @return null|string - Phone or null if none
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Set the Phone
	 *
	 * @param null|string $phone - Phone or null for none
	 */
	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

	/**
	 * Get the E-Mail
	 *
	 * @return null|string - E-Mail or null if none
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the E-Mail
	 *
	 * @param null|string $email - E-Mail or null for none
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * Get the Contact-Person
	 *
	 * @return null|string - Contact-Person or null if none
	 */
	public function getContactPerson()
	{
		return $this->contactPerson;
	}

	/**
	 * Set the Contact-Person
	 *
	 * @param null|string $contactPerson - Contact-Person or null for none
	 */
	public function setContactPerson($contactPerson)
	{
		$this->contactPerson = $contactPerson;
	}

	/**
	 * Returns the Communication Class
	 *
	 * @return StdClass - Communication Class
	 * @since 2.0
	 */
	protected function getCommunicationClass_v2()
	{
		$class = new StdClass;

		if ($this->getPhone() !== null)
			$class->phone = $this->getPhone();
		if ($this->getEmail() !== null)
			$class->email = $this->getEmail();
		if ($this->getContactPerson() !== null)
			$class->contactPerson = $this->getContactPerson();

		// Just set a Contact-Person (The name) if nothing else if given since this is a required element but every element is optional...
		if ($this->getPhone() === null && $this->getEmail() === null && $this->getContactPerson() === null)
			$class->contactPerson = $this->getName();

		return $class;
	}

	/**
	 * Returns the Communication Class
	 *
	 * @return StdClass - Communication Class
	 * @since 3.0
	 */
	protected function getCommunicationClass_v3()
	{
		return $this->getCommunicationClass_v2();
	}

	/**
	 * Returns a Class for the DHL-SendPerson
	 *
	 * @return StdClass - DHL-SendPerson-class
	 * @since 2.0
	 */
	abstract public function getClass_v2();

	/**
	 * Returns a Class for the DHL-SendPerson
	 *
	 * @return StdClass - DHL-SendPerson-class
	 * @since 3.0
	 */
	abstract public function getClass_v3();
}
