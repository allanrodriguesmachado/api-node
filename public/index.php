<?php

declare(strict_types=1);

use App\Database\Connect;
use App\Database\Entity\UserEntity;

require_once "../vendor/autoload.php";

$layer = new ReflectionClass(\App\Models\User::class);
$model = new \App\Models\User();

$model = new \App\Models\User();
$user = $model->load(1);

dd($user);