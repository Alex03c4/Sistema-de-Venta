<div class="grid grid-cols-5 md:grid-cols-6 ml-6">
    <?php
    if (isset($date['taggables'])) {

        if (!$date['taggables'] == NULL) {
            foreach ($date['tags'] as $key => $value) {
                foreach ($date['taggables'] as $key2 => $value2) {
                    if ($value->id == $value2->tag_id) { ?>
                        <div class="mt-4 space-y-4 hover:text-indigo-600">
                            <div class="flex items-start">
                                <div class="flex items-center">
                                    <input checked value="<?php echo $value->id ?>" name="checkbox[]" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-2 text-sm">
                                    <label for="comments" class="font-medium text-gray-700"><?php echo $value->nombre ?></label>
                                </div>
                            </div>
                        </div>
                    <?php
                        unset($date['tags'][$key]);
                    }
                }
            }
        }
    }
    foreach ($date['tags'] as $key => $value) {         
        ?>
        <div class="mt-4 space-y-4 hover:text-indigo-600">
            <div class="flex items-start">
                <div class="flex items-center">
                    <input value="<?php echo $value->id ?>" name="checkbox[]" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                </div>
                <div class="ml-2 text-sm">
                    <label for="comments" class="font-medium text-gray-700"><?php echo $value->nombre ?></label>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>