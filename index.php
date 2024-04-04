<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
#Initiate cURL.

$ch = curl_init(API_URL);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
?>

<head>
  <title>The next film to Marvel </title>
  <meta name="description" content="The next film to Marvel is <?= $data['title']; ?>." />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<main>
  <pre style="font-size: 0.5rem; overflow: scroll; height: 250px;">
    <?php
    var_dump($data);
    ?>  
  </pre>
  <section>
    <img src="<?= $data['poster_url']; ?>" alt="<?= $data['title']; ?>" width="250" style="border-radius: 1rem; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);" />
  </section>

  <hgroup>
    <h1>The next film to Marvel is <?= $data['title']; ?>.</h1>
    <p>It will be released on <?= $data['release_date']; ?>.</p>
    <p>The following film is: <?= $data['following_production']['title']; ?>.</p>
  </hgroup>


</main>


<style>
  :root {
    color-scheme: light dark;
  }

  body {
    display: grid;
    place-items: center;
  }

  section {
    display: flex;
    justify-content: center;
    text-align: center;
  }

  hgroup {
    text-align: center;
  }

  img {
    margin: 0 auto;
  }
</style>