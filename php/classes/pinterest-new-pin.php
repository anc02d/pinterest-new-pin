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
	 *
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
}
?>