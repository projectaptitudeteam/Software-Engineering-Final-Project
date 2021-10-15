<?php

class WidgetFactory
{
    public static function bannerMessage(?string $bannerMessage) : void {
        if( !empty($bannerMessage) ) {
            ?>
            <div class="m-2 p-3 text-center alert-danger fw-bold text-danger">
                <?php echo $bannerMessage; ?>
            </div>
            <?php
        }
    }
}