<?php

namespace App\CoreMechanism;

use App\Permission;


/**
 * Author: CodeMechanix
 * Description: Access control for User
 */

class Acl
{
	private $group_permissions;
	private $is_system_user;

	function __construct($user)
	{

		if ($user->is_system_user == 1) {

			$this->is_system_user = true;
			$this->group_permissions = [];

		} else {
			$this->is_system_user = false;

			$this->group_permissions = $user->group->permissions()->pluck('codename')->toArray();
		}

	}

	public function has_permissions($permission = '')
	{
		if($this->is_system_user)
		{
			return true;

		} else {

			if (in_array($permission, $this->group_permissions)) {

				return true;

			} else {

				abort(403, 'You have no access permission.');

			}

		}
	}

	public function get_group_permissions()
	{
		return $this->group_permissions;
	}
}
