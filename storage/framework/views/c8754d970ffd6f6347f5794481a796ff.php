<a href="<?php echo e(route('artikel.detail.artikel', $a->id)); ?>" class="artikel-card">

    <?php if($a->image): ?>
        <img src="<?php echo e(asset('storage/'.$a->image)); ?>">
    <?php else: ?>
        <img src="<?php echo e(asset('img/default-news.jpg')); ?>">
    <?php endif; ?>

    <div class="artikel-content">

        <div class="meta-row">

            <span class="kategori-home">
                <?php echo e($a->category); ?>

            </span>

            <span class="tanggal">
                <?php echo e($a->created_at->format('d M Y')); ?>

            </span>

        </div>

        <h3>
            <?php echo e(\Illuminate\Support\Str::limit($a->title, 55)); ?>

        </h3>

    </div>

</a>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\partials\card_artikel.blade.php ENDPATH**/ ?>