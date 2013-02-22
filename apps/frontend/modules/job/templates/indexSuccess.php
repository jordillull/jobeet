<?php use_stylesheet('jobs.css') ?>
<h1>Jobs List</h1>

<div id="jobs">
	<table class="jobs">
		<?php foreach ($JobeetJobs as $i => $job): ?>
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


