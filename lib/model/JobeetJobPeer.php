<?php


/**
 * Skeleton subclass for performing query and update operations on the 'jobeet_job' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Thu Feb 21 10:15:45 2013
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class JobeetJobPeer extends BaseJobeetJobPeer {

	static public function getActiveJobs($criteria)
	{
		if (is_null($criteria))
		{
			$criteria = new criteria();
		}

		$criteria->add(self::EXPIRES_AT, time(), Criteria::GREATER_THAN);
		$criteria->addDescendingOrderByColumn(self::EXPIRES_AT);

		return self::doSelect($criteria);
	}

	static public function doSelectActive(Criteria $criteria)
	{
		$criteria->add(self::EXPIRES_AT, time(), Criteria::GREATER_THAN);

		return self::doSelectOne($criteria);
	}

} // JobeetJobPeer
