<?php
partial('header'); ?>

    <div class="flex m-8">
        <div class="w-1/4 mr-8 text-white">
            <div class="flex justify-between bg-indigo-500 p-6">
                <div class="flex flex-col">
                    <span>City:</span>
                    <span>Ad Type:</span>
                    <span>Real Estate Type:</span>
                    <span>Area:</span>
                    <span>Price:</span>
                    <span>Year:</span>
                </div>
                <div class="flex flex-col">
                    <span><?= $real_estate->city($real_estate->city_id) ?></span>
                    <span><?= $real_estate->ad_type($real_estate->ad_type_id) ?></span>
                    <span><?= $real_estate->re_type($real_estate->re_type_id) ?></span>
                    <span><?= htmlspecialchars($real_estate->area) ?></span>
                    <span><?= htmlspecialchars($real_estate->price) ?></span>
                    <span><?= htmlspecialchars($real_estate->year) ?></span>
                </div>
            </div>

            <div class="flex flex-col justify-between mt-4 p-6 bg-indigo-500 ">
                <span>Description:</span>
                <p class="mt-2"><?= htmlspecialchars($real_estate->description) ?></p>
            </div>

            <div class="flex justify-between mt-4">
                <button class="w-1/2 py-3 mr-4 bg-indigo-500">
                    <a href=<?= "real-estates/{$real_estate->id}/edit" ?>>Edit</a>
                </button>
                <form action="<?= "real-estates/{$real_estate->id}" ?>"
                      method="POST"
                      class="w-1/2">
                    <input type="hidden" name="method" value="DELETE">
                    <button class="w-full py-3 bg-red-500">Delete</button>
                </form>
            </div>
        </div>

        <div class="w-3/4 grid grid-cols-3 gap-8">
            <?php foreach ($real_estate->photos($real_estate->id) as $photo): ?>
                <img src="<?= $photo->path ?>" alt="real estate photo" class="col-span-1 w-full h-48 object-scale-down border-2 bg-white p-2 border-indigo-700">
            <?php endforeach; ?>
        </div>

    </div>

<?php
partial('footer'); ?>