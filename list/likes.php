<?php $commentList = $page->comments();?>
<?php if ($likes = $commentList->filterBy('type', 'like-of')) : ?>
    <?php if ($likes->isNotEmpty()): ?>
    <h3>Likes</h3>
    <ul class="list-likes">
        <?php foreach ($likes as $comment) : snippet('komments/response/like', ['comment' => $comment]);
        endforeach; ?>
    </ul>
<?php endif; ?>
<?php endif; ?>

<!-- Wrapped inside conditional empty test, added title -->
