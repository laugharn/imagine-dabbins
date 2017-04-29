<?php
    require '../vendor/autoload.php';

    use Abraham\TwitterOAuth\TwitterOAuth;
    use League\Csv\Reader;

    $dotenv = new Dotenv\Dotenv('../');
    $dotenv->load();

    $connection = new TwitterOAuth(getenv('CONSUMER_KEY'), getenv('CONSUMER_SECRET'), getenv('ACCESS_TOKEN'), getenv('ACCESS_TOKEN_SECRET'));

    $csv = Reader::createFromPath('names.csv');

    $names = $csv->setOffset(1)->fetchAll();
    shuffle($names);

    $connection->post('statuses/update', ['status' => 'Imagine ' . $names[0][0] . ' dabbing.']);
