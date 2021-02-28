<?php
partial('header'); ?>

<div class="flex">
    <form action="/real-estates/search" method="GET">

        <div class="flex flex-col w-60 mb-4">
            <label for="city">City</label>
            <select name="city_id"
                    id="city"
                    class="p-1 border border-black">
                <option value=""></option>
                <?php foreach ($cities as $key => $value): ?>
                    <option value="<?= $cities[$key]->id ?>"><?= $cities[$key]->name ?></option>
                <?php endforeach; ?>
            </select>
            <?= isset($errors) && array_key_exists('city_id', $errors) ? '<p class="text-sm text-red-500">' . $errors['city_id'] . '</p>' : '' ?>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="city">Ad Type</label>
            <select name="ad_type_id"
                    id="ad_type"
                    class="p-1 border border-black">
                <option value=""></option>
                <?php foreach ($ad_types as $key => $value): ?>
                    <option value="<?= $ad_types[$key]->id ?>"><?= $ad_types[$key]->name ?></option>
                <?php endforeach; ?>
            </select>
            <?= isset($errors) && array_key_exists('ad_type_id', $errors) ? '<p class="text-sm text-red-500">' . $errors['ad_type_id'] . '</p>' : '' ?>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="city">Real Estate Type</label>
            <select name="re_type_id"
                    id="re_type"
                    class="p-1 border border-black">
                <option value=""></option>
                <?php foreach ($re_types as $key => $value): ?>
                    <option value="<?= $re_types[$key]->id ?>"><?= $re_types[$key]->name ?></option>
                <?php endforeach; ?>
            </select>
            <?= isset($errors) && array_key_exists('re_type_id', $errors) ? '<p class="text-sm text-red-500">' . $errors['re_type_id'] . '</p>' : '' ?>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="area">Area</label>
            <input type="text"
                   name="area"
                   id="area"
                   class="p-1 border border-black">
            <?= isset($errors) && array_key_exists('area', $errors) ? '<p class="text-sm text-red-500">' . $errors['area'] . '</p>' : '' ?>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for=price"">Price</label>
            <input type="text"
                   name="price"
                   id="price"
                   class="p-1 border border-black">
            <?= isset($errors) && array_key_exists('price', $errors) ? '<p class="text-sm text-red-500">' . $errors['price'] . '</p>' : '' ?>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="year">Year</label>
            <input type="text"
                   name="year"
                   id="year"
                   class="p-1 border border-black">
            <?= isset($errors) && array_key_exists('year', $errors) ? '<p class="text-sm text-red-500">' . $errors['year'] . '</p>' : '' ?>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="description">Description</label>
            <textarea name="description"
                      id="description"
                      class="p-1 border border-black"></textarea>
            <?= isset($errors) && array_key_exists('description', $errors) ? '<p class="text-sm text-red-500">' . $errors['description'] . '</p>' : '' ?>
        </div>

        <button>Search</button>

    </form>
    <div class="flex">
        <?php
        foreach ($real_estates as $real_estate): ?>
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
</div>





<a href="/real-estates/create">Add New!</a>

<?php
partial('footer'); ?>
