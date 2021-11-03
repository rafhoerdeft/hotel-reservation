<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
    <ul class="pagination">
    <?php if ($pager->hasPreviousPage()) : ?>
        <li title="<?= lang('Pager.first') ?>">
            <a href="<?= str_replace('index.php/', '', $pager->getFirst()) ?>" aria-label="<?= lang('Pager.first') ?>">
                <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
            </a>
        </li>
        <li title="<?= lang('Pager.previous') ?>">
            <a href="<?= str_replace('index.php/', '', $pager->getPreviousPage()) ?>" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
            </a>
        </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
        <li <?= $link['active'] ? 'class="active"' : '' ?>>
            <a href="<?= str_replace('index.php/', '', $link['uri']) ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach ?>

    <?php if ($pager->hasNextPage()) : ?>
        <li title="<?= lang('Pager.next') ?>">
            <a href="<?= str_replace('index.php/', '', $pager->getNextPage()) ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
            </a>
        </li>
        <li title="<?= lang('Pager.last') ?>">
            <a href="<?= str_replace('index.php/', '', $pager->getLast()) ?>" aria-label="<?= lang('Pager.last') ?>">
                <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
            </a>
        </li>
    <?php endif ?>
    </ul>
</nav>