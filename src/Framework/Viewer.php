<?php

namespace Framework;

class Viewer
{
    public function render(string $template, array $data = []): string
    {

        extract($data, EXTR_SKIP);

        ob_start();

        require "views/$template";

       return ob_clean();

        //return file_get_contents("views/$template");
     }
}