<?php
include_once('init.php');

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('mail', 50)->unique();
    $table->string('passhash', 40);
    $table->string('salt', 4);
    $table->string('title', 20);
});

Capsule::schema()->dropIfExists('product_categories');

Capsule::schema()->create('product_categories', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('creator_id')->unsigned()->index();
    $table->string('title');
});

Capsule::schema()->dropIfExists('products');

Capsule::schema()->create('products', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('category_id')->unsigned()->index();;
    $table->string('title');
});

