<?php

#
#    S P Y C
#      a simple php yaml class
#
# license: [MIT License, http://www.opensource.org/licenses/mit-license.php]
#

include('spyc.php');
$array = Spyc::YAMLLoad("site.yaml");

echo '<pre>';
print_r($array);
echo '</pre>';