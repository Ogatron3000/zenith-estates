<?php partial('header'); ?>

<div class="bg-yellow-200">
    <h1><?= htmlspecialchars($real_estate->name) ?></h1>
    <h1><?= htmlspecialchars($real_estate->area) ?></h1>
    <h1><?= htmlspecialchars($real_estate->price) ?></h1>
    <h1><?= htmlspecialchars($real_estate->year) ?></h1>
    <h1><?= htmlspecialchars($real_estate->description) ?></h1>
    <h1><?= $real_estate->city($real_estate->city_id) ?></h1>
    <h1><?= $real_estate->ad_type($real_estate->ad_type_id) ?></h1>
    <h1><?= $real_estate->re_type($real_estate->re_type_id) ?></h1>
</div>

<?php partial('footer'); ?>