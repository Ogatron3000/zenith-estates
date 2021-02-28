<?php
partial('header');
partial('navbar'); ?>

    <div class="flex m-8">
        <div class="w-1/4 mr-8">
            <div class="flex justify-between p-6 bg-gray-100 rounded-lg">
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

            <div class="flex flex-col justify-between mt-4 p-6 bg-gray-100 rounded-lg">
                <span>Description:</span>
                <p class="mt-2"><?= htmlspecialchars($real_estate->description) ?></p>
            </div>

            <div class="flex justify-between mt-4">
                <button class="w-1/2 py-2 mr-4 bg-blue-400 hover:bg-blue-300 rounded-full text-white">
                    <a href=<?= "{$real_estate->id}/edit" ?>>Edit</a>
                </button>
                <form action="<?= "{$real_estate->id}" ?>"
                      method="POST"
                      class="w-1/2">
                    <input type="hidden" name="method" value="DELETE">
                    <button class="w-full py-2 bg-red-500 hover:bg-red-400 rounded-full text-white">Delete</button>
                </form>
            </div>
        </div>

        <div class="w-3/4 grid grid-cols-3 gap-8">
            <?php foreach ($real_estate->photos($real_estate->id) as $photo): ?>
                <img src="<?= $photo->path ?>" alt="real estate photo" class="col-span-1 w-full h-48 object-contain border-2 border-blue-400 rounded-lg bg-white">
            <?php endforeach; ?>
        </div>

    </div>

<?php
partial('footer'); ?>