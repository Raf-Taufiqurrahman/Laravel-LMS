<?php

namespace App\Traits;

trait HasColor
{
    public function randomColor()
    {
        return Collect([
            'azure' , 'blue', 'indigo', 'purple', 'pink', 'red', 'orange', 'yellow', 'lime',
            'green', 'teal', 'cyan', 'gray'
        ]);
    }
}
