<?php $__env->startSection('content'); ?>
<div class="container py-4" id="app">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body ">
                    <div class="form-row justify-content-center">
                        <h3>Iniciar Sesión</h3>
                    </div>
                    <div class="form-row justify-content-center">
                        <img class="logoM" src="<?php echo e(asset('img/m.png')); ?>" />
                    </div>
                    <!-- Form Login -->
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span  class="input-group-text">
                                            <i class="fas fa-user-friends"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" 
                                    value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                                </div>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-6">
                                <label for="password" >Contraseña</label>
                                <password mandatory></password>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="form-check-label" for="remember">
                                        Recordar
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <button type="submit" class="btn btn-warning col-md-6">
                                Entrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PF-Mercado\resources\views/auth/login.blade.php ENDPATH**/ ?>