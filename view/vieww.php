<?php
if ($post): ?>
<div>
    <h1>
        <?php echo $post->title ?>
    </h1>
    <p>echo $post->text </p>
</div>
<?php else: ?>
    <div>
        <h1>404</h1>
    </div>
<?php endif; ?>