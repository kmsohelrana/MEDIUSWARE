<?php $__env->startSection('content'); ?>
<div class="container-fluid app-body settings-page">
<form action="<?php echo e(route('history')); ?>" method="get">
		<?php echo e(csrf_field()); ?>

		<div class="row">
			<div class="col-md-4">
				<div class="input-group ">
					<input type="text" name="name" class="form-control" placeholder="Group Name" required>		
				</div>
			</div>
			<div class="col-md-4">
				<div class="input-group">
					<input type="text" name="date" placeholder="Post Date" class="form-control datepicker" required>			
				</div>
			</div>
			<div class="col-md-4">
				<div class="input-group">
					<select name="type" class="form-control" required>
						<option value="">Select-group-type</option>
						<?php $__currentLoopData = $socialPostGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>				
				</div>
			</div>
		</div>
		<button type="submit" name="filter" value="filter" class="btn btn-primary">Filter</button>
	    <a href="<?php echo e(url('history')); ?>" class="btn btn-success">Refresh</a>
	</form>
	<table class="table">
	<thead><?php echo e($socialPosts->count()); ?></thead>
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

	  <?php echo e($socialPosts->links()); ?>



</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>