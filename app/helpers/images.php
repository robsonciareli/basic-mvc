<?php

use app\classes\Images;

function images($image, $path)
{
     return (new Images($image, $path))->getImage();
}
                                                                                                                    