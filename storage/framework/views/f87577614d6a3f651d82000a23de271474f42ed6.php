<!-- Top Contact -->
<section class="top-contact">
    <div class="container clearfix">
        <div class="top-contact--left pull-left">
            <span>
                Gmail:
                <a href="mailto:info@newvocustom.com">info@newvocustom.com</a>
            </span>
            <span>
                Toll free : <a href="tel:603-689-4557">603-689-4557</a>
            </span>
        </div>
        <div class="top-contact--right pull-right">
            <?php if(!empty($data['settings'][0]->facebook_link)): ?>
            <a href="<?php echo e($data['settings'][0]->facebook_link); ?>" target="_blank">
                <i class="zmdi zmdi-facebook"></i>
            </a>
            <?php endif; ?>
            <?php if(!empty($data['settings'][0]->instagram_link)): ?>
            <a href="<?php echo e($data['settings'][0]->instagram_link); ?>" target="_blank">
                <i class="zmdi zmdi-instagram"></i>
            </a>
            <?php endif; ?>
            <?php if(!empty($data['settings'][0]->dribble_link)): ?>
            <a href="<?php echo e($data['settings'][0]->dribble_link); ?>" target="_blank">
                <i class="zmdi zmdi-dribbble"></i>
            </a>
            <?php endif; ?>
            <?php if(!empty($data['settings'][0]->google_link)): ?>
            <a href="<?php echo e($data['settings'][0]->google_link); ?>" target="_blank">
                <i class="zmdi zmdi-google"></i>
            </a>
            <?php endif; ?>
            <?php if(!empty($data['settings'][0]->twitter_link)): ?>
            <a href="<?php echo e($data['settings'][0]->twitter_link); ?>" target="_blank">
                <i class="zmdi zmdi-twitter"></i>
            </a>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Top Contact -->
<?php /**PATH C:\xampp\htdocs\furniture\resources\views/layouts/inc/topcontact.blade.php ENDPATH**/ ?>