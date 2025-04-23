<?php
    $classNames = ['u-comment', 'h-cite'];
    $classNames[] = 'comment-type_' . $comment->type();

    if ($comment->verified()->isTrue()) {
        $classNames[] = 'verified';
    }
?>
<li class="<?= implode(' ', $classNames); ?>" id="c<?= $comment->id(); ?>">
    <?php if ($header = $slots->header()): ?>
        <?= $header ?>
    <?php else: ?>
        <header class="h-card">
            <?php if ($comment->authorUrl()->isNotEmpty()): ?><a class="u-author" href="<?= $comment->authorUrl(); ?>" rel="nofollow" target="_blank"><img class="u-photo" src="<?= $comment->authorAvatar(); ?>" onerror="this.onerror=null;this.src='/avatar.png';"alt="<?= $comment->authorName(); ?>"/></a>
            <?php else: ?>
            <img class="u-photo" src="<?= $comment->authorAvatar(); ?>" onerror="this.onerror=null;this.src='/avatar.png';"alt="<?= $comment->authorName(); ?>"/>
            <?php endif; ?>
        </header>
    <?php endif; ?>

    <?php if ($body = $slots->body()): ?>
        <?= $body ?>
    <?php else: ?>
        <div class="p-content p-name"><h3><?= $comment->authorName(); ?></h3><?= $comment->content()->kirbytext(); ?></div>
    <?php endif; ?>

    <?php if ($footer = $slots->footer()): ?>
        <?= $footer ?>
    <?php else: ?>
        <footer>
            <a class="u-url" href="<?= $comment->permalink(); ?>">
                <time class="dt-published"><?= $comment->createdAt(); ?></time>
            </a>&nbsp;| 
            <a href="#kommentform" class="kommentReply" data-id="<?= $comment->id(); ?>" data-handle="<?= $comment->authorName(); ?>"><?= t('mauricerenck.komments.action.reply.text'); ?></a>
        </footer>
    <?php endif; ?>
    <?php if ($replies = $slots->replies()): ?>
        <?= $replies ?>
    <?php endif; ?>
</li>
