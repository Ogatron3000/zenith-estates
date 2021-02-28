<?php
partial('header'); ?>

    <form action="../real-estates" method="POST" enctype="multipart/form-data" class="p-6 bg-yellow-200">

        <div class="flex flex-col w-60 mb-4">
            <label for="city">City</label>
            <select name="city_id"
                    id="city"
                    class="p-1 border border-black">
                <?php foreach ($cities as $key => $value): ?>
                    <option value="<?= $cities[$key]->id ?>"
                            <?= old('city_id', $old) === $cities[$key]->id ? 'selected' : '' ?>
                    >
                            <?= $cities[$key]->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?= isset($errors) && array_key_exists('city_id', $errors) ? '<p class="text-sm text-red-500">' . $errors['city_id'] . '</p>' : '' ?>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="city">Ad Type</label>
            <select name="ad_type_id"
                    id="ad_type"
                    class="p-1 border border-black">
                <?php foreach ($ad_types as $key => $value): ?>
                    <option value="<?= $ad_types[$key]->id ?>"
                            <?= old('ad_type_id', $old) === $ad_types[$key]->id ? 'selected' : '' ?>
                    >
                        <?= $ad_types[$key]->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?= isset($errors) && array_key_exists('ad_type_id', $errors) ? '<p class="text-sm text-red-500">' . $errors['ad_type_id'] . '</p>' : '' ?>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="city">Real Estate Type</label>
            <select name="re_type_id"
                    id="re_type"
                    class="p-1 border border-black">
                <?php foreach ($re_types as $key => $value): ?>
                    <option value="<?= $re_types[$key]->id ?>"
                            <?= old('re_type_id', $old) === $re_types[$key]->id ? 'selected' : '' ?>
                    >
                        <?= $re_types[$key]->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?= isset($errors) && array_key_exists('re_type_id', $errors) ? '<p class="text-sm text-red-500">' . $errors['re_type_id'] . '</p>' : '' ?>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="area">Area</label>
            <input type="text"
                   name="area"
                   id="area"
                   value="<?= old('area', $old) ?>"
                   class="p-1 border border-black">
            <?= isset($errors) && array_key_exists('area', $errors) ? '<p class="text-sm text-red-500">' . $errors['area'] . '</p>' : '' ?>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for=price"">Price</label>
            <input type="text"
                   name="price"
                   id="price"
                   value="<?= old('price', $old) ?>"
                   class="p-1 border border-black">
            <?= isset($errors) && array_key_exists('price', $errors) ? '<p class="text-sm text-red-500">' . $errors['price'] . '</p>' : '' ?>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="year">Year</label>
            <input type="text"
                   name="year"
                   id="year"
                   value="<?= old('year', $old) ?>"
                   class="p-1 border border-black">
            <?= isset($errors) && array_key_exists('year', $errors) ? '<p class="text-sm text-red-500">' . $errors['year'] . '</p>' : '' ?>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="description">Description</label>
            <textarea name="description"
                      id="description"
                      class="p-1 border border-black"><?= old('description', $old) ?></textarea>
            <?= isset($errors) && array_key_exists('description', $errors) ? '<p class="text-sm text-red-500">' . $errors['description'] . '</p>' : '' ?>
        </div>


        <div class="flex flex-col w-60">
            <label for="photos">Add photos</label>
            <input type="file"
                   name="photos[]"
                   id="photos"
                   multiple
                   class="p-1 border border-black">
            <?= isset($errors) && array_key_exists('photos', $errors) ? '<p class="text-sm text-red-500">' . $errors['photos'] . '</p>' : '' ?>
        </div>

        <button>Submit</button>

    </form>

<?php
partial('footer'); ?>