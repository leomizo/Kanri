<?php

header("Content-type: ".$curriculum['Curriculum']['type']);
header("Content-disposition: inline;filename=".$curriculum['Curriculum']['name']);
echo $curriculum['Curriculum']['content'];
exit();