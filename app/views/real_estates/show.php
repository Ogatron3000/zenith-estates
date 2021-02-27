<?php
partial('header'); ?>

    <div class="bg-yellow-200">
        <h1><?= htmlspecialchars($real_estate->area) ?></h1>
        <h1><?= htmlspecialchars($real_estate->price) ?></h1>
        <h1><?= htmlspecialchars($real_estate->year) ?></h1>
        <h1><?= htmlspecialchars($real_estate->description) ?></h1>
        <h1><?= $real_estate->city($real_estate->city_id) ?></h1>
        <h1><?= $real_estate->ad_type($real_estate->ad_type_id) ?></h1>
        <h1><?= $real_estate->re_type($real_estate->re_type_id) ?></h1>

        <?php foreach ($real_estate->photos($real_estate->id) as $photo): ?>
            <img src="<?= $photo->path ?>" alt="real estate photo" style="width: 150px; height: 150px; object-fit: cover">
        <?php endforeach; ?>
    </div>

<?php
partial('footer'); ?>