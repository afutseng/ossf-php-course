<?php
class Human
{
	public static $handCount = 2;
	public $name = '';
	private $birthday = '';

	public function __construct($name, $birthday)
	{
		$this->name = $name;
		$this->birthday = $birthday;
	}

	public function getAge()
	{
		$sec = time() - strtotime($this->birthday);
		return intval($sec / 60 / 60 / 24 / 365);
	}

	public function getName()
	{
		return $this->name;
	}

	public function setHandCount($handCount)
	{
		self::$handCount = $handCount;
	}

	public function getHandCount()
	{
		return self::$handCount;
	}
}

date_default_timezone_set('Asia/Taipei');

$jaceju = new Human('Jace Ju', '1979-04-27');

echo $jaceju->getName(), PHP_EOL;

Human::setHandCount(3);

echo $jaceju->getAge() . PHP_EOL;

echo $jaceju->getHandCount() . PHP_EOL;
