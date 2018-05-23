<?php $__env->startSection('title'); ?>
    Create Subcategory | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
   Create Subcategory for <?php echo e($cat->Name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::open([      
        'method' => 'POST',
        'action' => 'SubcategoryController@store',
        'files' => 'true',
        'onsubmit' => 'return validateFields();'
    ]); ?>



    <div class="panel panel-primary">       
        <div class="panel-body">
            <div class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Icon: </label>
                    <div class="col-sm-10">
                        <input class="imgInput" type="file" name="images">
                        <img class="inputPreview" src="#" alt="your image">
                    </div>
                </div>

                <div class="form-group <?php echo e($errors->has('display_name') ? ' has-error' : ''); ?>">
                    <label class="col-sm-2 control-label">Name: </label>
                    <div class="col-sm-10">
                        <input class="form-control" name="display_name" type="text" maxlength="160" required />
                        
                        <?php if($errors->has('display_name')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('display_name')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>                        

                <div class="form-group">
                    <label class="col-sm-2 control-label">Status: </label>
                    <div class="col-sm-3">
                        <?php echo Form::select('status', ['Live' => 'Live', 'Test' => 'Test', 'New' => 'New', 'TurnOff' => 'Turn Off'], null, ['class' => 'form-control', 'placeholder' => '--Select Status--' ,'required']); ?> 
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Allow Upload: </label>
                    <div class="col-sm-10">
                        <input type="checkbox" name="allowupload" value="1"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Show Menu Footer: </label>
                    <div class="col-sm-10">
                        <input type="checkbox" name="menufooter" value="1"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Allow Share: </label>
                    <div class="col-sm-10">
                        <input type="checkbox" name="allowshare" value="1"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Show Top Banner: </label>
                    <div class="col-sm-10">
                        <input type="checkbox" name="topbannershow" value="1"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Is Expanded: </label>
                    <div class="col-sm-10">
                        <input type="checkbox" name="isexpanded" value="1"/>
                    </div>
                </div>

                <div class="form-group <?php echo e($errors->has('order') ? ' has-error' : ''); ?>">
                    <label class="col-sm-2 control-label">Sort Order: </label>
                    <div class="col-sm-1">
                        <input class="form-control" name="order" placeholder="0" min="1" type="number" required>
                        
                        <?php if($errors->has('order')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('order')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">View Color: </label>
                    <div class="col-sm-2">
                        <input type="color" class="form-control" name="color">
                    </div>
                    <div class="col-sm-2">
                        <input type="checkbox" name="no_color" value="1"/> No Color
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Type: </label>
                    <div class="col-sm-3">
                        <?php echo Form::select('type', ['Folder' => 'Folder', 'Article' => 'Article'], null, ['id' => 'type-option', 'class' => 'form-control', 'placeholder' => '--Select Subcategory Type--' ,'required']); ?> 
                    </div>
                </div>

                <div id="Article" class="category-hide">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Article: </label>
                        <div class="col-sm-10">
                        <?php echo Form::select('articleId', $allArticles, null, ['id' => 'type-option', 'class' => 'form-control selArticle', 'placeholder' => '--Select Article--']); ?> 
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Visible to Security Groups: </label>
                    <div class="col-sm-3">
                        <table>
                            <span id="hb-secgroup" style="display:none;" class="help-block"></span>
                            <?php $__currentLoopData = $securitygroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sgroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="checkbox" name="securitygroups[]" id="securitygroup<?php echo e($sgroup->Id); ?>" value="<?php echo e($sgroup->Id); ?>" checked/></td>
                                <td><label for="securitygroup<?php echo e($sgroup->Id); ?>" class="col-sm-2 control-label"><?php echo e($sgroup->DisplayName); ?></label></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="Save"> 
                        <a href="<?php echo e(route('subcategory.show',Session::get('CategoryId'))); ?>" class="btn btn-danger">Cancel</a>
                    </div>
                </div>

            </div> <!-- end of form-horizontal -->
        </div> <!-- panel body -->
    </div> <!-- panel-primary -->

    <?php echo Form::close(); ?>


    <script type="text/javascript">

        $("#type-option").change(function() {
            if($(this).val() == "Article") {
                // show article combo box
                $('#Article').removeClass('category-hide').addClass('category-show');
                $(".selArticle").attr('required',true);
            } else {
                // hide article combo box
                $('#Article').removeClass('category-show').addClass('category-hide');
                $(".selArticle").attr('required',false);
            }
        });

        //------------------ IMAGE PREVIEW -------------//
        function readURL() {
            var $input = $(this);      

            var imgPath = $(this)[0].value;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

            if (extn == "png" || extn == "jpg" || extn == "jpeg") 
            {
                if (typeof (FileReader) != "undefined") 
                {            
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $input.next('.inputPreview').attr('src', e.target.result).show();
                            $(".imgPreview").hide();
                        }
                        reader.readAsDataURL(this.files[0]);                
                    }
                } 
                else 
                {
                    alert("This browser does not support FileReader.");
                }
            } 
            else
            {
                $input.next('.inputPreview').hide();
                $(this)[0].value = '';

                alert("Please select images only.");
            }
        }

        $(".imgInput").change(readURL);

        function validateFields() {
            // category should be visible to at least one security group
            if($('input[name^="securitygroups"]:checked').size() <= 0) {
                //$("#hb-secgroup").css("display","block");
                //$("#hb-secgroup").text("Category should be visible to at least one security group.");
                return true;
            } else {
                $("#hb-secgroup").css("display","none");
                return true;
            }
        }

    </script>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>