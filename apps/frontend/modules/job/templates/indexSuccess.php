<?php use_stylesheet('jobs.css') ?>

<div id="jobs"> 
	<?php foreach ($categories as $category): ?>
		<div class="category_<?php echo Jobeet::slugify($category->getName()) ?>">
			<div class="category">
				<div class="feed">
					<a href="">Feed</a>
				</div>
				<a href="<?php echo url_for('job_category', $category) ?>">
					<h1><?php echo $category ?></h1> 
				</a>
			</div> 
		
		<table class="jobs"> 
			<?php foreach ($category->getActiveJobs(sfConfig::get('app_max_jobs_on_homepage')) as $i => $job): ?>
				<tr class= "<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
					<td class="location"><?php echo $job->getLocation() ?></td>
					<td class="position">
					<a href="<?php echo url_for('job_show_user', $job) ?> ">
						<?php echo $job->getPosition() ?>
					</a>
					</td>
					<td class="company"><?php echo $job->getCompany() ?></td>
				</tr>
    	<?php endforeach; ?>
		</table>
	</div>
  <?php endforeach; ?>
</div>
