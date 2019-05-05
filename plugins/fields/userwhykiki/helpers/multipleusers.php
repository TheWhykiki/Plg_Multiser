<?php


defined('_JEXEC') or die;

class MultipleUsersHelper {

	public function getUserById($userIds){
		// Get a db connection.
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		$query->select(array('a.*', 'b.*'));
		$query->from($db->quoteName('#__users','a'));
		$query->join('LEFT', $db->quoteName('#__contact_details', 'b') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('b.user_id') . ')');


		if (is_array($userIds))
		{
			foreach($userIds as $id){

				$query->where($db->quoteName('a.id') . ' = '. $db->quote($id),'OR');
			}
		}
		if(is_string($userIds)){
			$query->where($db->quoteName('a.id') . ' = '. $db->quote($userIds));
		}

		$db->setQuery($query);
		//die(str_replace('#_', 'qfh2v', $query));

		$results = $db->loadAssocList();
		return $results;
	}

}
?>