<?php

/**
 * job actions.
 *
 * @package    obeet
 * @subpackage job
 * @author     Your name here
 */
class jobActions extends sfActions
{
	public function executePublish(sfWebRequest $request)
	{
    $request->checkCSRFProtection();

		$job = $this->getRoute()->getObject();
		$job->publish();

		$this->getUser()->setFlash('notice', sprintf('Your job is now online for %s days.', sfConfig::Get('app_active_days')));

		$this->redirect('job_show_user', $job);
	}
	
  public function executeIndex(sfWebRequest $request)
	{
		$this->categories = JobeetCategoryPeer::getWithJobs(null);
  } 

  public function executeShow(sfWebRequest $request)
  {
		$this->job = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
		$job = new JobeetJob();
		$job->setType('full-time');

		$criteria = new Criteria();
		$criteria->add(JobeetCategoryPeer::SLUG, 'programming');
		$category = new JobeetCategoryPeer();
		$category_programming = $category->doSelectOne($criteria);

		if (!is_null($category_programming))
		{ 
			$job->setCategoryId($category_programming->getId());
		}

    $this->form = new JobeetJobForm($job);
  }

  public function executeCreate(sfWebRequest $request)
  { 
    $this->form = new JobeetJobForm(); 
    $this->processForm($request, $this->form); 
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new JobeetJobForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new JobeetJobForm($this->getRoute()->getObject());
    $this->processForm($request, $this->form); 
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

		$job = $this->getRoute()->getObject();
    $job->delete();

    $this->redirect('job/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
		$form->bind(
			$request->getParameter($form->getName()), 
			$request->getFiles($form->getName())
		);

    if ($form->isValid())
    {
      $job = $form->save();

      $this->redirect('job_show', $job);
    }
  }
}
