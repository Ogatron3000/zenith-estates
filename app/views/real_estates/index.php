<?php
partial('header'); ?>

<div class="flex justify-between">

    <div class="grid m-8 grid-cols-6 gap-8 w-full h-1/2">
        <?php
        foreach ($real_estates as $real_estate): ?>
            <div class="p-6 bg-gray-100 col-span-2">
                <img src="<?= $real_estate->photos($real_estate->id)[0]->path ?>" alt="real estate photo" class="w-full h-48 object-scale-down border-2 bg-white p-2 border-black">
                <div class="flex justify-between mt-4">
                    <div class="flex flex-col w-1/2">
                        <span>City:</span>
                        <span>Ad Type:</span>
                        <span>Real Estate Type:</span>
                        <span>Area:</span>
                        <span>Price:</span>
                        <span>Year:</span>
                    </div>
                    <div class="flex flex-col w-1/2">
                        <span><?= $real_estate->city($real_estate->city_id) ?></span>
                        <span><?= $real_estate->ad_type($real_estate->ad_type_id) ?></span>
                        <span><?= $real_estate->re_type($real_estate->re_type_id) ?></span>
                        <span><?= htmlspecialchars($real_estate->area) ?></span>
                        <span><?= htmlspecialchars($real_estate->price) ?></span>
                        <span><?= htmlspecialchars($real_estate->year) ?></span>
                    </div>
                </div>
                <div class="flex justify-between mt-4">
                    <a href=<?= "real-estates/{$real_estate->id}" ?>>Details</a>
                    <div class="flex justify-between w-1/2">
                        <a href=<?= "real-estates/{$real_estate->id}/edit" ?>>Edit</a>
                        <form action="<?= "real-estates/{$real_estate->id}" ?>"
                              method="POST"
                              class="text-red-500">
                            <input type="hidden" name="method" value="DELETE">
                            <button>Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        endforeach; ?>
    </div>


    <div class="w-1/6 p-8 bg-indigo-500 text-white sticky top-14 h-screen z-10">
        <h2 class="mb-4">Find Real Estate:</h2>
        <form action="/real-estates/search" method="GET" class="text-sm">

            <div class="flex flex-col mb-4">
                <label for="city">City</label>
                <select name="city_id"
                        id="city"
                        class="p-1 mt-1">
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
                        class="p-1 mt-1">
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
                        class="p-1 mt-1">
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
                       class="p-1 mt-1">
                <?= isset($errors) && array_key_exists('area', $errors) ? '<p class="text-sm text-red-500">' . $errors['area'] . '</p>' : '' ?>
            </div>

            <div class="flex flex-col mb-4">
                <label for=price"">Price</label>
                <input type="text"
                       name="price"
                       id="price"
                       class="p-1 mt-1">
                <?= isset($errors) && array_key_exists('price', $errors) ? '<p class="text-sm text-red-500">' . $errors['price'] . '</p>' : '' ?>
            </div>

            <div class="flex flex-col mb-4">
                <label for="year">Year</label>
                <input type="text"
                       name="year"
                       id="year"
                       class="p-1 mt-1">
                <?= isset($errors) && array_key_exists('year', $errors) ? '<p class="text-sm text-red-500">' . $errors['year'] . '</p>' : '' ?>
            </div>

            <div class="flex flex-col mb-4">
                <label for="description">Description</label>
                <textarea name="description"
                          id="description"
                          class="p-1 mt-1"></textarea>
                <?= isset($errors) && array_key_exists('description', $errors) ? '<p class="text-sm text-red-500">' . $errors['description'] . '</p>' : '' ?>
            </div>

            <button class="bg-yellow-300 text-indigo-500 w-full py-2 font-bold text-md hover:bg-yellow-400 hover:text-indigo-400">Search</button>

        </form>
    </div>

</div>

<?php
partial('footer'); ?>
