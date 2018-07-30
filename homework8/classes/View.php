<?php

class View
{
    public $data = []; //з-е [], иначе $data[] = '' - ошибка.

    public function assign(string $name, $value)
    {
        $this->data[$name] = $value;
    }

    public function display(string $template)
    {
        if ( file_exists($template) ) {

            foreach ($this->data as $name => $value) {

                $$name = $value;

            }

            include $template;

        }

    }

    public function render(string $template)
    {
        if ( file_exists($template) ) {

            ob_start();

            $this->display($template);
            $content = ob_get_contents();

            ob_end_clean();

            return $content;
        }

        return '';
    }


}