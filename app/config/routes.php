<?php

return array(
    "GET /" => "HelloWorld::renderBasic",
    "GET /hello/{name}" => "HelloWorld::renderPrettyPage"
);