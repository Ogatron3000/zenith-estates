<?php
partial('header'); ?>

<div class="flex">
    <?php
    foreach ($data as $real_estate): ?>
        <div class="p-8 bg-gray-100 m-4 w-50">
            <h1><?= htmlspecialchars($real_estate->area) ?></h1>
            <h1><?= htmlspecialchars($real_estate->price) ?></h1>
            <h1><?= htmlspecialchars($real_estate->year) ?></h1>
            <h1><?= htmlspecialchars($real_estate->description) ?></h1>
            <h1><?= $real_estate->city($real_estate->city_id) ?></h1>
            <h1><?= $real_estate->ad_type($real_estate->ad_type_id) ?></h1>
            <h1><?= $real_estate->re_type($real_estate->re_type_id) ?></h1>
            <a href=<?= "real-estates/{$real_estate->id}" ?>>Details</a>
            <a href=<?= "real-estates/{$real_estate->id}/edit" ?>>Edit</a>
            <form action="<?= "real-estates/{$real_estate->id}" ?>"
                  method="POST">
                <input type="hidden" name="method" value="DELETE">
                <button>Delete</button>
            </form>
        </div>
    <?php
    endforeach; ?>
</div>

<a href="real-estates/create">Add New!</a>

<?php
partial('footer'); ?>
