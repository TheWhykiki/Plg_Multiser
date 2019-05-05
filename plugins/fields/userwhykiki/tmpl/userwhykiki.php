<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Text
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$value = $field->value;

JLoader::register('MultipleUsersHelper', JPATH_BASE . '/plugins/fields/userwhykiki/helpers/multipleusers.php');


if ($value == '')
{
	return;
}

$searchString = ',';

if( strpos($value, $searchString) !== false ) {
	$value = explode(',', $value);
}

if (is_array($value))
{
	$userData  = MultipleUsersHelper::getUserById($value);


	foreach ($userData as $user)
	{
		if (in_array($user['username'], $user))
		{
			$texts[] =[
				'username'  =>  $user['username'],
				'id'        =>  $user['id'],
				'email'     =>  $user['email'],
				'telephone' =>  $user['telephone'],
				'fax'       =>  $user['fax']
			];
		}
	}
	echo 'Kokokokokoko';

}
if(is_string($value)){
	$userData  = MultipleUsersHelper::getUserById($value);
	echo htmlentities(implode(', ', $userData));
}


