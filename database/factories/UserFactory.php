<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'designation' => $faker->jobTitle,
        'bio' => $faker->paragraph,
        'user_img' => 'No image found',
        'password' => $password ?: $password = bcrypt('Karachi123@'),
        'remember_token' => str_random(10),
        'status' => 'ACTIVE',
    ];
});

/* CATEGORY FACTORY */
$factory->define(App\Category::class, function (Faker $faker) {
    $title = $faker->name;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->paragraph,
        'status' => $faker->randomElement(array('DEACTIVE','ACTIVE')),  
        
    ];
});

/* AUTHOR FACTORY */
$factory->define(App\Author::class, function (Faker $faker) {
    $title = $faker->name;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'designation' => $faker->jobTitle,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'country' => $faker->country,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'description' => $faker->paragraph,
        'author_feature' => $faker->randomElement(array('no','yes')),
        'facebook_id' => $faker->freeEmail,
        'twitter_id' => $faker->freeEmail,
        'youtube_id' => $faker->freeEmail,
        'pinterest_id' => $faker->freeEmail,
        'author_img' => 'No image found',
        'status' => $faker->randomElement(array('DEACTIVE','ACTIVE')),
    ];
});

/* BOOK FACTORY */
$factory->define(App\Book::class, function (Faker $faker) {
    $title = $faker->name;
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 100),
        'category_id' => $faker->numberBetween($min = 1, $max = 100),
        'author_id' => $faker->numberBetween($min = 1, $max = 100),
        'title' => $title,
        'slug' => str_slug($title),
        'availability' => $faker->randomElement(array('Stock', 'out of Stock')),
        'price' => $faker->numberBetween($min = 1000, $max = 10000),
        'rating' => 'rating',
        'publisher' => $faker->company,
        'country_of_publisher' => $faker->country,
        'isbn' => $faker->isbn13,
        'isbn-10' => $faker->isbn10,
        'audience' => $faker->randomElement(array('General','Audult', 'Kids')),
        'format' => $faker->randomElement(array('ePUB','eBook', 'PDF', 'DOC')),
        'language' => $faker->languageCode,
        'description' => $faker->paragraph,
        'book_upload' => 'pdf not found',
        'book_img' => 'No image found',
        'total_pages' => $faker->numberBetween($min = 100, $max = 1000),
        'downloaded' => $faker->numberBetween($min = 1, $max = 1000),
        'edition_number' => $faker->randomElement(array('1st Edition','2nd Edition', '3rd Edition')),
        'recomended' => $faker->boolean,
        'status' => $faker->randomElement(array('DEACTIVE','ACTIVE', 'UPCOMING')),
    ];
});

/* MEDIA FACTORY */
$factory->define(App\Media::class, function (Faker $faker) {
    $title = $faker->name;
    return [
        'media_type' => $faker->randomElement(array('slider','gallery')),
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->paragraph,
        'media_img' => 'No image found',
        'status' => $faker->randomElement(array('DEACTIVE','ACTIVE')),
    ];
});

/* TEAM FACTORY */
$factory->define(App\Team::class, function (Faker $faker) {
    $fullname = $faker->name;
    return [
        'fullname' => $fullname,
        'designation' => $faker->jobTitle,
        'telephone' => $faker->phoneNumber,
        'mobile' => $faker->e164PhoneNumber,
        'email' => $faker->safeEmail,
        'facebook_id' => $faker->freeEmail,
        'twitter_id' => $faker->freeEmail,
        'pinterest_id' => $faker->freeEmail,
        'team_img' => 'No image found',
        'status' => $faker->randomElement(array('DEACTIVE','ACTIVE'))
    ];
});