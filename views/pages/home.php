<div class="container-fluid">
    <div class="blocks">
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <div class="block">
                    <?= $user['name'] ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
