<?php
/**
 * This is a Pinterest Board, owned by a User with a Profile already created.
 *
 * @author Noel Cothren <noelcothren@gmail.com>
 * @version 1.0
 **/
class Board {
	/**
	 * id for this board; this is the primary key
	 * @var int $boardId
	 */
	private $boardId;
	/**
	 * id of the profile that created this board; this is a foreign key
	 * @var int $boardProfileId
	 */
	private $boardProfileId;
	/**
	 * user-entered name for the board
	 * @var $boardName
	 */
	private $boardName;
	/**
	 * accessor method for board id
	 * @return int value of board id
	 */
	public function getBoardId() {
		return($this->boardId);
	}
	/**
	 * mutator method for board id
	 * @param int|null $newBoardId new value for board id
	 * @throws \RangeException if $newBoardId is not positive
	 * @throws \TypeError if $newBoardId is not an integer
	 */
	public function setBoardId(int $newBoardId = null) {
		if($newBoardId === null) {
			$this->boardId = null;
			return;
		}
		if($newBoardId <= 0) {
			throw(new \RangeException("board id is not positive"));
		}
		$this->boardId = $newBoardId;
	}
	/**
	 * accessor method for board profile id
	 * @return int value of board profile id
	 */
	public function getBoardProfileId() {
		return($this->boardProfileId);
	}
	/**
	 * mutuator method for board profile id
	 * @param int|null $newBoardProfileId new value for board profile id
	 * @throws \RangeException if $newBoardProfileId is not positive
	 * @throws \TypeError if $newBoardProfileId is not an integer
	 */
	public function setBoardProfileId(int $newBoardProfileId = null) {
		if($newBoardProfileId === null) {
			$this->boardProfileId = null;
			return;
		}
		if($newBoardProfileId <= 0) {
			throw(new \RangeException("board profile id is not positive"));
		}
		$this->boardProfileId = $newBoardProfileId;
	}
	/**
	 * accessor method for board name
	 * @return string value of board name
	 **/
	public function getBoardName() {
		return $this->boardName;
	}
	/**
	 * mutator method for board name
	 * @param string $newBoardName
	 * @throws \RangeException if board name is > 32 characters
	 * @throws \InvalidArgumentException if $newBoardName is empty or insecure
	 */
	public function setBoardName(string $newBoardName) {
		$newBoardName = trim($newBoardName);
		$newBoardName = filter_var($newBoardName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newBoardName) === true) {
			throw(new \InvalidArgumentException("Content is empty."));
		}
		if(strlen($newBoardName) >= 33) {
			throw(new \RangeException("Board name is too long."));
		}
		$this->boardName = $newBoardName;
	}
}