<?php

    class IndexView{
        public function render() {
            $data = "<h1>TESSSSSSSSSSSSSSSSSSSSSSSSSSSSS</h1>";

            $view = new Template("templates/index.html");

            $view->replace("ISI_HALAMAN", $data);
            $view->write();
        }
    }
?>