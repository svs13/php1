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
            $c = ob_get_contents();

            ob_end_clean();

            return $c;
        }

        return '';
    }

    public function get(string $name)
    {
        if ( isset( $this->data[$name] ) ) {

            return $this->data[$name];
        }

    }

}