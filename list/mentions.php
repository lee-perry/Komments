<?php $commentList = $page->comments();?>
<?php if ($mentions = $commentList->filterBy('type', 'mention-of')) : ?>
<?php if ($mentions->isNotEmpty()): ?>
    <h3>Mentions</h3>
    <ul class="list-mentions">
        <?php foreach ($mentions as $comment) : snippet('komments/response/mention', ['comment' => $comment]);
        endforeach; ?>
    </ul>
<?php endif; ?>
<?php endif; ?>

