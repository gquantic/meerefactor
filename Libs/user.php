<?php
class User extends Db
{
	function __construct()
    {

	}

	function updateBalance($id, $balance, $hold)
    {
		return $this->query("UPDATE `users` SET `balance`='$balance', `hold`='$hold' WHERE `id`='$id'");
	}

	function updateRefbalance($id, $rbalance, $rhold)
    {
		return $this->query("UPDATE `users` SET `referal_balance`='$rbalance', `referal_hold`='$rhold' WHERE `id`='$id'");
	}
}