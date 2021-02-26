<?php partial('header'); ?>

    <form action="../real-estates" method="POST" class="p-6 bg-yellow-200">
        <div class="flex flex-col w-60 mb-4">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="p-1 border border-black">
        </div>
        <div class="flex flex-col w-60 mb-4">
            <label for="area">Area</label>
            <input type="text" name="area" id="area" class="p-1 border border-black">
        </div>
        <div class="flex flex-col w-60 mb-4">
            <label for=price"">Price</label>
            <input type="text" name="price" id="price" class="p-1 border border-black">
        </div>
        <div class="flex flex-col w-60 mb-4">
            <label for="year">Year</label>
            <input type="text" name="year" id="year" class="p-1 border border-black">
        </div>
        <div class="flex flex-col w-60 mb-4">
            <label for="city">City</label>
            <select name="city_id" id="city" class="p-1 border border-black">
                <?php foreach ($cities as $key=>$value): ?>
                    <option value="<?= $cities[$key]->id ?>"><?= $cities[$key]->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="flex flex-col w-60 mb-4">
            <label for="city">Ad Type</label>
            <select name="ad_type_id" id="ad_type" class="p-1 border border-black">
                <?php foreach ($ad_types as $key=>$value): ?>
                    <option value="<?= $ad_types[$key]->id ?>"><?= $ad_types[$key]->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="flex flex-col w-60 mb-4">
            <label for="city">Real Estate Type</label>
            <select name="re_type_id" id="re_type" class="p-1 border border-black">
                <?php foreach ($re_types as $key=>$value): ?>
                    <option value="<?= $re_types[$key]->id ?>"><?= $re_types[$key]->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="flex flex-col w-60">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="p-1 border border-black"></textarea>
        </div>
        <button>Submit</button>
    </form>

<?php partial('footer'); ?>