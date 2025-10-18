<div class="max-w-5xl mx-auto mt-8 px-4">
    <h2 class="text-2xl font-semibold mb-6">Cadastro de Colaboradores</h2>

    
    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <form wire:submit.prevent="<?php echo e($isEdit ? 'update' : 'store'); ?>" class="space-y-4">
        <div>
            <input type="text"
                   wire:model="nome"
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="Nome">
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div>
            <input type="email"
                   wire:model="email"
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="Email">
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div>
            <input type="text"
                   wire:model="telefone"
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['telefone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="Telefone">
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['telefone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div>
            <select wire:model="cargo_id"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['cargo_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <option value="">Selecione o cargo</option>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cargos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cargo->id); ?>"><?php echo e($cargo->nome); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['cargo_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                <?php echo e($isEdit ? 'Atualizar' : 'Salvar'); ?>

            </button>

            <!--[if BLOCK]><![endif]--><?php if($isEdit): ?>
                <button type="button"
                        wire:click="resetInput"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                    Cancelar
                </button>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </form>

    <hr class="my-8">

    
    <div class="overflow-x-auto">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="p-3 border-b">ID</th>
                    <th class="p-3 border-b">Nome</th>
                    <th class="p-3 border-b">Email</th>
                    <th class="p-3 border-b">Telefone</th>
                    <th class="p-3 border-b">Cargo</th>
                    <th class="p-3 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $colaboradores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colaborador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3"><?php echo e($colaborador->id); ?></td>
                        <td class="p-3"><?php echo e($colaborador->nome); ?></td>
                        <td class="p-3"><?php echo e($colaborador->email); ?></td>
                        <td class="p-3"><?php echo e($colaborador->telefone); ?></td>
                        <td class="p-3"><?php echo e($colaborador->cargo->nome ?? ''); ?></td>
                        <td class="p-3 space-x-2">
                            <button wire:click="edit(<?php echo e($colaborador->id); ?>)"
                                    class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-sm">
                                Editar
                            </button>

                            <button wire:click="delete(<?php echo e($colaborador->id); ?>)"
                                    class="inline-block px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
</div><?php /**PATH D:\repositoriosLsv\laravel12-livewire-crud\resources\views/livewire/colaborador.blade.php ENDPATH**/ ?>