<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

    <meta charset="utf-8">
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />

    <title>Sosna Directory</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css' rel='stylesheet' />
  </head>

  <body>

    <button onclick="sidebarButton()" id="mobile-button" name="button">click to hide</button>
    <button onclick="hideFunction()" id="mobile-button" name="button">click to map menu</button>

    <div class="wrapper">
      <!-- wraps page and content -->
          <div id="main-wrapper" class="main-wrapper">
