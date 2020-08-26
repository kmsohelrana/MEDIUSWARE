<?php $__env->startSection('content'); ?>


<div class="container-fluid app-body settings-page">
	<table class="table">
		<thead>
		  <tr>
			<th scope="col">Group Name</th>
			<th scope="col">Group Type</th>
			<th scope="col">Account Name</th>
			<th scope="col">Post Text</th>
			<th scope="col">time</th>
		  </tr>
		</thead>
		<tbody>
			<?php $__empty_1 = true; $__currentLoopData = $socialPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			<tr>
			<td><?php echo e($socialPost->group->name); ?></td>
			<td><?php echo e($socialPost->group->type); ?></td>
			<td><?php echo e($socialPost->group->user->name); ?></td>
			<td><?php echo e($socialPost->text); ?></td>
			<td><?php echo e($socialPost->created_at->toDateTimeString()); ?></td>
			</tr>	
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			<tr>
				<td>No Data Found</td>
			</tr>	
			<?php endif; ?>	 
		  
		</tbody>
	  </table>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>