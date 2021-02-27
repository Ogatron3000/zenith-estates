<?php
partial('header'); ?>

    <form action="<?= "../" . $real_estate->id ?>" method="POST" enctype="multipart/form-data" class="p-6 bg-yellow-200">

        <input type="hidden" name="method" value="PUT">
        <input type="hidden" name="id" value="<?= $real_estate->id ?>">

        <div class="flex flex-col w-60 mb-4">
            <label for="city">City</label>
            <select name="city_id"
                    id="re_type"
                    class="p-1 border border-black">
                <?php foreach ($cities as $key => $value): ?>
                    <option value="<?= $cities[$key]->id ?>"
                        <?= $real_estate->city($real_estate->city_id) === $cities[$key]->name ? 'selected' : '' ?>>
                        <?= $cities[$key]->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="city">Ad Type</label>
            <select name="ad_type_id"
                    id="re_type"
                    class="p-1 border border-black">
                <?php foreach ($ad_types as $key => $value): ?>
                    <option value="<?= $ad_types[$key]->id ?>"
                        <?= $real_estate->ad_type($real_estate->ad_type_id) === $ad_types[$key]->name ? 'selected' : '' ?>>
                        <?= $ad_types[$key]->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="city">Real Estate Type</label>
            <select name="re_type_id"
                    id="re_type"
                    class="p-1 border border-black">
                <?php foreach ($re_types as $key => $value): ?>
                    <option value="<?= $re_types[$key]->id ?>"
                        <?= $real_estate->re_type($real_estate->re_type_id) === $re_types[$key]->name ? 'selected' : '' ?>>
                        <?= $re_types[$key]->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="area">Area</label>
            <input type="text"
                   name="area"
                   id="area"
                   class="p-1 border border-black"
                   value="<?= $real_estate->area ?>">
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for=price"">Price</label>
            <input type="text"
                   name="price"
                   id="price"
                   class="p-1 border border-black"
                   value="<?= $real_estate->price ?>">
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="year">Year</label>
            <input type="text"
                   name="year"
                   id="year"
                   class="p-1 border border-black"
                   value="<?= $real_estate->year ?>">
        </div>

        <div class="flex flex-col w-60 mb-4">
            <label for="description">Description</label>
            <textarea name="description"
                      id="description"
                      class="p-1 border border-black"><?= $real_estate->description ?></textarea>
        </div>

        <div class="flex flex-col w-60">
            <label for="photos">Add photos</label>
            <input type="file"
                   name="photos[]"
                   id="photos"
                   multiple
                   class="p-1 border border-black">
        </div>

        <button>Submit</button>

    </form>

<?php
partial('footer'); ?>