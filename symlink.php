<?php
//execute with tinker
$path_project = __DIR__;
$parent_path = dirname(dirname($path_project));
symlink($parent_path.'/shared/public/storage', $path_project.'/public/storage');