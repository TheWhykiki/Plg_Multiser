<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Owlimg
 *
 * @copyright   Copyright (C) 2017 NAME. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JFormHelper::loadFieldClass('text');

class JFormFieldUserwhykiki extends JFormFieldText
{
	public $type = 'Userwhykiki';

	protected function getInput()
	{

		$document = JFactory::getDocument();
		$document->addScript('/plugins/fields/userwhykiki/assets/js/multiselect.js');
		$document->addScriptOptions('parameters', array(
			'selectID'  => $this->id,
			'values'    => $this->value
		));

		$users = $this->_getUsers();
		//var_dump($users);

		//var_dump($this->getRenderer($this->layout)->render($this->getLayoutData()));
		//return $this->getRenderer($this->layout)->render($this->getLayoutData());
		$field =  '<input type="hidden" name="'.$this->name.'" id="'.$this->id.'" value="'.$this->value.'"/>';

		$field .= '<select multiple id="userSelect">';
		foreach($users as $user){
			$field .= '<option value="'.$user->id.'">'.$user->username.'</option>';
		}
		$field .= '</select>';

		return $field;
	}

	protected function _getUsers(){
		// Get a db connection.
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		$query->select('*');
		$query->from($db->quoteName('#__users'));
		//$query->order('ordering ASC');

		$db->setQuery($query);

		$results = $db->loadObjectList();
		return $results;
	}

}

