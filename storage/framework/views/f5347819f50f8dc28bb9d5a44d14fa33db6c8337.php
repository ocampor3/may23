<?php $__env->startSection('title'); ?>
    Edit Site | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    Editing Site <b><?php echo e($site->Title); ?></b>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::model($site, [
        'method' => 'PATCH',
        'route' => ['site.update', $site->Id],
        'files' => 'true'
    ]); ?>


    <div id="panel-style" class="panel panel-primary">              
        <div class="panel-body">

            <div class="form-horizontal"> 
                <div class="form-group">
                    
                    <div id="imgActive1" class="col-sm-3 div-center">
                        <div class="icon-edit">
                            <a class="btn btn-success" onClick="hideImgActive(1);">Change Icon</a>
                        </div>

                        <div class="crud-icon">
                            <div class="icon-img">
                                <img src="<?php echo e($site->Icon); ?>" alt="Image"> 
                            </div>
                        </div>                          
                    </div>
                
                    <div id="imgReplace1" class="col-sm-3 div-center" style="display:none;">
                        <div class="icon-edit">
                            <input type="file" class="imgInput" id="fileUpload" type="file" name="images">
                        </div>

                        <div class="crud-icon">
                            <div class="icon-img">
                                <img id="newIcon" class="inputPreview" src="#" alt="your image">
                            </div>
                        </div>                            
                    </div>


                    <div class="col-sm-9">

                        <div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">              
                            <label class="col-sm-2 control-label">Title: </label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="<?php echo e($site->Title); ?>" maxlength="160" required />
                            
                                <?php if($errors->has('title')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group <?php echo e($errors->has('url') ? ' has-error' : ''); ?>">   
                            <label for="title" class="col-sm-2 control-label">Site URL:</label>    
                            <div class="col-sm-10">                              
                                <input type="text" value="<?php echo e($site->SiteUrl); ?>" name="url" class="form-control" maxlength = "255" required />

                                <?php if($errors->has('url')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('url')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>       
                        </div>

                        <div class="form-group <?php echo e($errors->has('sitecode') ? ' has-error' : ''); ?>">   
                            <label for="title" class="col-sm-2 control-label">Site Code:</label>    
                            <div class="col-sm-10">                              
                                <input type="text" value="<?php echo e($site->SiteCode); ?>" name="sitecode" class="form-control" maxlength = "100" required />

                                <?php if($errors->has('sitecode')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('sitecode')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>       
                        </div>

                        <div class="form-group">   
                            <label for="title" class="col-sm-2 control-label">Parent Site Code:</label>    
                            <div class="col-sm-3">  
                                <?php if($parentSite): ?>                            
                                    <?php echo Form::select('parentid', $allSites, $parentSite->Id, ['id' => 'type-option', 'class' => 'form-control', 'placeholder' => '--Select Site Code--']); ?> 
                                <?php else: ?>
                                    <?php echo Form::select('parentid', $allSites, 0, ['id' => 'Type-option', 'class' => 'form-control', 'placeholder' => '--Select Site Code--']); ?> 
                                <?php endif; ?>
                            </div>       
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password Required: </label>
                            <div class="col-sm-10">
                                <?php if($site->PasswordRequired == 1): ?>
                                    <input type="checkbox" name="passwordrequired[]" checked/>
                                <?php else: ?>
                                    <input type="checkbox" name="passwordrequired[]" />
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Show Menu Footer: </label>
                            <div class="col-sm-10">
                                <?php if($site->MenuFooter == 1): ?>
                                    <input type="checkbox" name="menufooter[]" checked/>
                                <?php else: ?>
                                    <input type="checkbox" name="menufooter[]" />
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Allow Favorites: </label>
                            <div class="col-sm-10">
                                <?php if($site->AllowFavorites == 1): ?>
                                    <input type="checkbox" name="allowfavorites[]" checked/>
                                <?php else: ?>
                                    <input type="checkbox" name="allowfavorites[]" />
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Show Top Banner: </label>
                            <div class="col-sm-10">
                                <?php if($site->TopBannerShow == 1): ?>
                                    <input type="checkbox" name="topbannershow[]" checked/>
                                <?php else: ?>
                                    <input type="checkbox" name="topbannershow[]" />
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Show Hamburger Footer: </label>
                            <div class="col-sm-10">
                                <?php if($site->HamburgerFooter == 1): ?>
                                    <input type="checkbox" name="hamburgerfooter[]" checked/>
                                <?php else: ?>
                                    <input type="checkbox" name="hamburgerfooter[]" />
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Show In Login: </label>
                            <div class="col-sm-10">
                                <?php if($site->ShowInLogin == 1): ?>
                                    <input type="checkbox" name="showinlogin[]" checked/>
                                <?php else: ?>
                                    <input type="checkbox" name="showinlogin[]" />
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">   
                            <label for="title" class="col-sm-2 control-label">Status:</label>    
                            <div class="col-sm-4">                              
                                <?php echo Form::select('status', ['Live' => 'Live', 'Test' => 'Test', 'New' => 'New', 'TurnOff' => 'Turn Off'], $site->Status, 
                                    ['id' => 'col-half-width', 'class' => 'form-control', 
                                    'placeholder' => '--Select Status--', 'required']); ?> 
                            </div>       
                        </div>

                        <div class="form-group">   
                            <label for="title" class="col-sm-2 control-label">View Type:</label>    
                            <div class="col-sm-4">                              
                                <?php echo Form::select('viewtype',['None' => 'None', 'GridView' => 'Grid View','ListView' => 'List View', 'WindowsView' => 'Windows View'], $site['theme']->ViewType, 
                                    ['id' => 'col-half-width', 'class' => 'form-control', 
                                    'placeholder' => '--Select View Type--','required']); ?> 
                            </div>       
                        </div>

                        <div class="form-group">   
                            <label for="title" class="col-sm-2 control-label">Subview Type:</label>    
                            <div class="col-sm-4">                              
                                <?php echo Form::select('subviewtype',['None' => 'None', 'GridView' => 'Grid View', 'ListView' => 'List View', 'WindowsView' => 'Windows View'], $site['theme']->SubViewType, 
                                    ['id' => 'col-half-width', 'class' => 'form-control', 
                                    'placeholder' => '--Select View Type--', 'required']); ?> 
                            </div>       
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Is Article: </label>
                            <div class="col-sm-10">
                                <?php if($article!=null): ?>
                                    <input type="checkbox" id="isArticle" name="isArticle[]" checked/>
                                <?php else: ?>
                                    <input type="checkbox" id="isArticle" name="isArticle[]" />
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if($article!=null): ?>
                        <div id="Article" class="site-show">
                        <?php else: ?>
                        <div id="Article" class="site-hide">
                        <?php endif; ?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Article: </label>
                                <div class="col-sm-10">
                                <?php echo Form::select('articleId', $allArticles, $article != null ? $article->Id: null, ['id' => 'type-option', 'class' => 'form-control selArticle', 'placeholder' => '--Select Article--']); ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="form-group">   
                    <label for="title" class="col-sm-2 control-label"></label>    
                    <div class="col-sm-10">                              
                        <input type="submit" class="btn btn-success" value="Update"> 
                        <a href="<?php echo e(route('site.index')); ?>" class="btn btn-danger">Cancel</a>
                    </div>       
                </div>

            </div> <!-- form horizontal -->

        </div> <!-- panel body -->
    </div> <!-- primary panel -->

    <?php echo Form::close(); ?>

    <script type="text/javascript">

        $("#isArticle").change(function() {
            if($("#isArticle:checked").val()) {
                // show article combo box
                $('#Article').removeClass('site-hide').addClass('site-show');
                $(".selArticle").attr('required',true);
            } else {
                // hide article combo box
                $('#Article').removeClass('site-show').addClass('site-hide');
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
                            $('#newIcon').attr('src', e.target.result).show();
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


        // ------- HIDING PREVIEW TO CHANGE IMAGE -------- //        
        function hideImgActive($id){    
            $("#imgActive"+$id).hide();
            $("#imgReplace"+$id).show();
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>