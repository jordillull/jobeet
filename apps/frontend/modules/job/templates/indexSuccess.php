<?php use_stylesheet('jobs.css') ?>

<div id="jobs"> 
	<?php foreach ($categories as $category): ?>
		<div class="category_<?php echo Jobeet::slugify($category->getName()) ?>">
			<div class="category">
				<div class="feed">
					<a href="">Feed</a>
				</div>
				<a href="<?php echo url_for('category', $category) ?>">
					<h1><?php echo $category ?></h1> 
				</a>
			</div> 

	<?php include_partial('job/list', array('jobs' => $category->getActiveJobs(sfConfig::Get('app_max_jobs_on_homepage')))) ?>
		
	<?php if (($count = $category->countActiveJobs() - sfConfig::get('app_max_jobs_on_homepage')) > 0): ?>
			<div class="more_jobs">
				and <?php echo link_to($count, 'category', $category) ?> more...
			</div>
		<?php endif ?>
	</div>
  <?php endforeach; ?>
</div>
