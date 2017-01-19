<?php
/**
 *Creating Classes for Data
 *
 *This will include classes for my DataDesign Project
 *
 *@author Noel Cothren <noelcothren@gmail.com>
 *@version 1.0
 **/
class Profile {
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
	 * accesor method for profile at handle
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
}