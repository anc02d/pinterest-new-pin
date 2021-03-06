<?php
/**
 *Creating Classes for Data
 *
 *This will include classes for my DataDesign Project
 *
 *@author Noel Cothren <noelcothren@gmail.com>
 *@version 1.0
 **/
class Profile implements \jsonSerializable {
	/**
	 * id for this profile; this is the primary key
	 * @var int $profileId
	 **/
	private $profileId;
	/**
	 * the at handle user creates for their profile; it is unique
	 * @var string $profileAtHandle
	 */
	private $profileAtHandle;
	/**
	 * users' description of themselves or their profile
	 * @var string $profileDescription
	 */
	private $profileDescription;
	/**
	 * this is the password hash
	 * @var string $profilePasswordHash
	 */
	private $profilePasswordHash;
	/**
	 *this is the salt
	 *@var string $profileSalt
	 **/
	private $profileSalt;
	/**
	 * constructor for new profile
	 * @param int $newProfileId
	 * @param string $newProfileAtHandle
	 * @param string $newProfileDescription
	 * @param string $newProfilePasswordHash
	 * @param string $newProfileSalt
	 * @throws \InvalidArgumentException if data types are not vaild
	 * @throws \RangeException if data values are out of range
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if any other exception occurs
	 */
	public function __construct(int $newProfileId = null, string $newProfileAtHandle, string $newProfileDescription, string $newProfilePasswordHash, string $newProfileSalt) {
		try {
			$this->setProfileId($newProfileId);
			$this->setProfileAtHandle($newProfileAtHandle);
			$this->setProfileDescription($newProfileDescription);
			$this->setProfilePasswordHash($newProfilePasswordHash);
			$this->setProfileSalt($newProfileSalt);
		} catch(\InvalidArgumentException $invalidArgument) {
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $rangeException) {
			throw(new \RangeException($rangeException->getMessage(), 0, $rangeException));
		} catch(\TypeError $typeError) {
			throw(new \TypeError($typeError->getMessage(), 0, $typeError));
		} catch(\Exception $exception) {
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for profile id
	 * @return int value of profile id
	 */
	public function getProfileId() {
		return($this->profileId);
	}
	/**
	 * mutator method for setting profile id
	 * @param int|null $newProfileId
	 */
	public function setProfileId(int $newProfileId = null) {
		if($newProfileId === null) {
			$this->profileId = null;
			return;
		}
		if($newProfileId <= 0) {
			throw(new \RangeException("Profile Id is not positive"));
		}
		$this->profileId = $newProfileId;
	}
	/**
	 * accessor method for profile at handle
	 * @return string $newProfileAtHandle
	 */
	public function getProfileAtHandle() {
		return($this->profileAtHandle);
	}
	/**
	 * mutator method for profile at handle
	 * @param string $newProfileAtHandle
	 */
	public function setProfileAtHandle(string $newProfileAtHandle = null) {
		if($newProfileAtHandle === null) {
			$this->profileAtHandle = null;
			return;
		}
		$this->profileAtHandle = $newProfileAtHandle;
	}
	/**
	 * accessor method for profile description
	 * @return string
	 */
	public function getProfileDescription() {
		return $this->profileDescription;
	}
	/**
	 * mutator method for profile description
	 * @param string $newProfileDescription
	 * @throws \InvalidArgumentException if description is empty or insecure
	 * @throws \RangeException if description is > 200 characters
	 */
	public function setProfileDescription(string $newProfileDescription) {
		$newProfileDescription = trim($newProfileDescription);
		$newProfileDescription = filter_var($newProfileDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileDescription) === true) {
			throw(new \InvalidArgumentException("Description is empty or insecure"));
		}
		if(strlen($newProfileDescription) > 200) {
			throw(new \RangeException("Description is too long"));
		}
		$this->profileDescription = $newProfileDescription;
	}
	/**
	 * accessor method for profile password hash
	 * @return string
	 **/
	public function getProfilePasswordHash() {
		return $this->profilePasswordHash;
	}
	/**
	 *mutator method for profile password hash
	 *@param string $newProfilePasswordHash
	 **/
	public function setProfilePasswordHash(string $newProfilePasswordHash) {
		if (!ctype_xdigit($newProfilePasswordHash)) {
			throw(new \InvalidArgumentException("not a hexidecimal"));
		}
		if (strlen($newProfilePasswordHash) !== 128) {
			throw(new \RangeException("hash is not correct length"));
		}
		$this->profilePasswordHash = $newProfilePasswordHash;
	}
	/**
	 * accessor method for profile password salt
	 * @return string
	 **/
	public function getProfileSalt() {
		return $this->profileSalt;
	}
	/**
	 * mutator method for profile password salt
	 * @param string $newProfileSalt
	 */
	public function setProfileSalt(string $newProfileSalt) {
		if (!ctype_xdigit($newProfileSalt)) {
			throw(new \InvalidArgumentException("not a hexidecimal"));
		}
		if (strlen($newProfileSalt) !== 128) {
			throw(new \RangeException("salt is not correct length"));
		}
		$this->profileSalt = $newProfileSalt;
	}
	/**
	 * insert this profile into mySQL
	 * @param \PDO $pdo connection object
	 * @throws \PDOException for mySQL errors
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function insert(\PDO $pdo) {
		if($this->profileId !== null) {
			throw(new \PDOException("not a new profile id"));
		}
		$query = "INSERT INTO profile (profileId, profileAtHandle, profileDescription, profilePasswordHash, profileSalt) VALUES(:profileId, :profileAtHandle, :profileDescription, :profilePasswordHash, :profileSalt)";
		$statement = $pdo->prepare($query);
		$parameters = ["profileId" => $this->profileId, "profileAtHandle" => $this->profileAtHandle, "profileDescription"=> $this->profileDescription, "profilePasswordHash"=> $this->profilePasswordHash, "profileSalt"=> $this->profileSalt];
		$statement->execute($parameters);
		$this->profileId = intval($pdo->lastInsertId()); 
	}

	/**
	 * @return array of state variables to be serialized to JSON
	 */
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		unset($fields["profilePasswordHash"]);
		unset($fields["profileSalt"]);
		return($fields);
	}
}