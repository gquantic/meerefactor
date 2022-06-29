<?php

namespace Libs\Controllers;

use Libs\Controllers\Db;

class User extends Db
{
	public static function updateBalance($id, $balance, $hold)
    {
		return self::query("UPDATE `users` SET `balance`='$balance', `hold`='$hold' WHERE `id`='$id'");
	}

	public static function updateRefbalance($id, $rbalance, $rhold)
    {
		return self::query("UPDATE `users` SET `referal_balance`='$rbalance', `referal_hold`='$rhold' WHERE `id`='$id'");
	}
}