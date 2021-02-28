<?php
partial('header');
partial('navbar'); ?>

<div class="flex justify-between">

    <div class="grid m-8 grid-cols-4 gap-8 w-full h-1/2 w-3/4">
        <?php
        foreach ($real_estates as $real_estate): ?>
            <div class="p-6 bg-gray-100 rounded-lg text-sm col-span-1">
                <img src="<?= $real_estate->photos($real_estate->id)[0]->path ?>" alt="real estate photo" class="h-48 w-48 object-cover mx-auto border-2 border-blue-400 rounded-full bg-white">
                <div class="flex justify-between mt-4">
                    <div class="flex flex-col w-1/2">
                        <span class="mb-1">City:</span>
                        <span class="mb-1">Ad Type:</span>
                        <span class="mb-1">Type:</span>
                        <span class="mb-1">Area:</span>
                        <span class="mb-1">Price:</span>
                        <span>Year:</span>
                    </div>
                    <div class="flex flex-col text-right w-1/2">
                        <span class="mb-1"><?= $real_estate->city($real_estate->city_id) ?></span>
                        <span class="mb-1"><?= $real_estate->ad_type($real_estate->ad_type_id) ?></span>
                        <span class="mb-1"><?= $real_estate->re_type($real_estate->re_type_id) ?></span>
                        <span class="mb-1"><?= htmlspecialchars($real_estate->area) ?>m2</span>
                        <span class="mb-1">€<?= htmlspecialchars($real_estate->price) ?></span>
                        <span><?= htmlspecialchars($real_estate->year) ?></span>
                    </div>
                </div>
                <div class="flex justify-between mt-4">
                    <button class="w-1/3 bg-blue-400 rounded-full hover:bg-blue-300 text-white">
                        <a href=<?= "real-estates/{$real_estate->id}" ?>>Details</a>
                    </button>
                    <button class="w-1/3 py-1 mx-2 bg-blue-400 hover:bg-blue-300 rounded-full text-white">
                        <a href=<?= "real-estates/{$real_estate->id}/edit" ?>>Edit</a>
                    </button>
                    <form action="<?= "real-estates/{$real_estate->id}" ?>"
                          method="POST"
                          class="w-1/3">
                        <input type="hidden" name="method" value="DELETE">
                        <button class="w-full py-1 bg-red-500 hover:bg-red-400 rounded-full text-white">Delete</button>
                    </form>
                </div>
            </div>
        <?php
        endforeach; ?>
    </div>


    <div class="w-1/4 p-8 bg-blue-100 sticky top-14 h-screen z-10">
        <h2 class="mb-4">Find Real Estate:</h2>
        <form action="/real-estates/search" method="GET" class="text-sm">

            <div class="flex flex-col mb-4">
                <label for="city">City</label>
                <select name="city_id"
                        id="city"
                        class="p-1 mt-1 text-black">
                    <option value=""></option>
                    <?php foreach ($cities as $key => $value): ?>
                        <option value="<?= $cities[$key]->id ?>"><?= $cities[$key]->name ?></option>
                    <?php endforeach; ?>
                </select>
                <?= isset($errors) && array_key_exists('city_id', $errors) ? '<p class="text-sm text-red-500">' . $errors['city_id'] . '</p>' : '' ?>
            </div>

            <div class="flex flex-col mb-4">
                <label for="city">Ad Type</label>
                <select name="ad_type_id"
                        id="ad_type"
                        class="p-1 mt-1 text-black">
                    <option value=""></option>
                    <?php foreach ($ad_types as $key => $value): ?>
                        <option value="<?= $ad_types[$key]->id ?>"><?= $ad_types[$key]->name ?></option>
                    <?php endforeach; ?>
                </select>
                <?= isset($errors) && array_key_exists('ad_type_id', $errors) ? '<p class="text-sm text-red-500">' . $errors['ad_type_id'] . '</p>' : '' ?>
            </div>

            <div class="flex flex-col mb-4">
                <label for="city">Real Estate Type</label>
                <select name="re_type_id"
                        id="re_type"
                        class="p-1 mt-1 text-black">
                    <option value=""></option>
                    <?php foreach ($re_types as $key => $value): ?>
                        <option value="<?= $re_types[$key]->id ?>"><?= $re_types[$key]->name ?></option>
                    <?php endforeach; ?>
                </select>
                <?= isset($errors) && array_key_exists('re_type_id', $errors) ? '<p class="text-sm text-red-500">' . $errors['re_type_id'] . '</p>' : '' ?>
            </div>

            <div class="flex flex-col mb-4">
                <label for="area">Area</label>
                <input type="text"
                       name="area"
                       id="area"
                       class="p-1 mt-1 text-black">
                <?= isset($errors) && array_key_exists('area', $errors) ? '<p class="text-sm text-red-500">' . $errors['area'] . '</p>' : '' ?>
            </div>

            <div class="flex flex-col mb-4">
                <label for=price"">Price</label>
                <input type="text"
                       name="price"
                       id="price"
                       class="p-1 mt-1 text-black">
                <?= isset($errors) && array_key_exists('price', $errors) ? '<p class="text-sm text-red-500">' . $errors['price'] . '</p>' : '' ?>
            </div>

            <div class="flex flex-col mb-4">
                <label for="year">Year</label>
                <input type="text"
                       name="year"
                       id="year"
                       class="p-1 mt-1 text-black">
                <?= isset($errors) && array_key_exists('year', $errors) ? '<p class="text-sm text-red-500">' . $errors['year'] . '</p>' : '' ?>
            </div>

            <div class="flex flex-col mb-4">
                <label for="description">Description</label>
                <textarea name="description"
                          id="description"
                          class="p-1 mt-1 text-black"></textarea>
                <?= isset($errors) && array_key_exists('description', $errors) ? '<p class="text-sm text-red-500">' . $errors['description'] . '</p>' : '' ?>
            </div>

            <button class="w-full py-2 bg-blue-400 rounded-full text-white hover:bg-blue-300">Submit</button>

        </form>
    </div>

</div>

<?php
partial('footer'); ?>
