<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-5 col-md-4 col-lg-3  m-t-20">
                <div>

                </div>
                <div class="fileinput fileinput-new m-t-10">
                    <div class="fileinput-preview thumbnail form_Blade">
                        <?php if(isset($product->product_image)): ?>
                            <img src="<?php echo e(url('uploads/products/'.$product->product_image)); ?>" alt="avatar" width="300">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-md-8 col-lg-9 m-t-30">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('product.product_name')); ?></label>:
                    <?php echo e($product->product_name); ?>

                </div>
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('product.category_id')); ?></label>:
                    <?php echo e(is_null($product->category)?"-":$product->category->name); ?>

                </div>
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('product.product_type')); ?></label>:
                    <?php echo e($product->product_type); ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-3 m-t-10">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('product.status')); ?></label>
                    <div class="controls">
                        <?php echo e($product->status); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-lg-3 m-t-10">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('product.quantity_on_hand')); ?></label>
                    <div class="controls">
                        <?php echo e($product->quantity_on_hand); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-lg-3 m-t-10">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('product.quantity_available')); ?></label>
                    <div class="controls">
                        <?php echo e($product->quantity_available); ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-lg-3 m-t-10">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('product.sale_price')); ?></label>
                    <div class="controls">
                        <?php echo e($product->sale_price); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label" for="title"><?php echo e(trans('product.description')); ?></label>
                    <div class="controls">
                        <?php echo e($product->description); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="controls">
                        <?php if(@$action == 'show'): ?>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                        <?php else: ?>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> <?php echo e(trans('table.delete')); ?>

                            </button>
                            <a href="<?php echo e(url($type)); ?>" class="btn btn-warning"><i
                                        class="fa fa-arrow-left"></i> <?php echo e(trans('table.back')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>