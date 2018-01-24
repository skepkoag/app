<div>
    <?php foreach ($posts as $post):?>
        <? if ($post instanceof AbPost):?>
            <div>
                Рекламный пост
                <p><?php echo $post['title'] ?></p>
                <p><?php echo $post['text'] ?></p>
            </div>
        <?php elseif ($post instanceof Post):?>
            <div>
                <p><?php echo $post['title'] ?></p>
                <p><?php echo $post['text'] ?></p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
