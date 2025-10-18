<div class="max-w-4xl mx-auto mt-8 px-4">
    <h2 class="text-2xl font-semibold mb-6">Cadastro de Cargos</h2>

    
    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <form wire:submit.prevent="<?php echo e($isEdit ? 'update' : 'store'); ?>">
        <div class="mb-4">
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
                   placeholder="Nome do cargo">

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
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="p-3 border-b">ID</th>
                    <th class="p-3 border-b">Nome do Cargo</th>
                    <th class="p-3 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cargos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3"><?php echo e($cargo->id); ?></td>
                        <td class="p-3"><?php echo e($cargo->nome); ?></td>
                        <td class="p-3 space-x-2">
                            <button wire:click="edit(<?php echo e($cargo->id); ?>)"
                                    class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition text-sm">
                                Editar
                            </button>

                            <button wire:click="delete(<?php echo e($cargo->id); ?>)"
                                    class="inline-block px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">
                                Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH D:\repositoriosLsv\laravel12-livewire-crud\resources\views/livewire/colaborador-cargo.blade.php ENDPATH**/ ?>