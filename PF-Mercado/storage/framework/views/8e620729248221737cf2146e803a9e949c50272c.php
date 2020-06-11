<?php $__env->startSection('content'); ?>
    <div class="fondo">
        <div class="container">
            <div class="row puesto">
            <?php $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="card puesto" style="width: 16rem;">
                    <img src="<?php echo e(asset('storage/'.$item->foto)); ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-truncate "><?php echo e($item->nombre); ?></h5>
                        <p class="card-text"><?php echo e($item->info); ?></p>
                        <a href="<?php echo e(route('puesto', ['id' => $item->idPuesto])); ?>" class="btn btn-warning ">Entrar</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="row">
		        <div class="center">
			        <?php echo e($puestos->links()); ?>

		        </div>
	        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


					
<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PF-Mercado\resources\views/home.blade.php ENDPATH**/ ?>