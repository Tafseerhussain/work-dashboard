<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Work 
    <?php 
      if ($page == 'index.php') {
         echo '- Dashboard';
       } elseif ($page == 'user.php') {
         echo '- Edit Profile';
       } elseif ($page == 'users.php') {
         echo '- Users';
       } elseif ($page == 'projects.php') {
         echo '- Projects';
       } elseif ($page == 'project.php') {
         echo '- Add Project';
       } elseif ($page == 'records.php') {
         echo '- Records';
       }
    ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <style>
      .logout:hover {
        cursor: pointer;
      }
      [v-cloak] {
        display: none;
      }
      .actions {
        padding: 5px 8px !important;
      }
      .actions>button {
        padding-bottom: 0;
        padding-top: 5px;
      }
      .actions>button:hover {
        cursor: pointer;
      }
      .blurry{
        filter: blur(3px);
      }
      .user-form label {
        font-size: 12px;
      }
      .user-form,.card-profile,.users-fade-in,.project-fade-in,.all-records {
        -webkit-animation: fadein 1s; /* Safari, Chrome and Opera > 12.1 */
         -moz-animation: fadein 1s; /* Firefox < 16 */
          -ms-animation: fadein 1s; /* Internet Explorer */
           -o-animation: fadein 1s; /* Opera < 12.1 */
              animation: fadein 1s;
      }
      .loading {
        position: absolute;
        width: 100%;
        height: 98%;
        background: rgba(255,255,255,0.8);
        text-align: center;
        z-index: 999;
        top: 0;
        left: 0;
      }
      .loader {
          margin: 0;
          padding: 0;
          position: relative;
          top: 45%;
          transform: translateY(-50%);
      }
      @keyframes fadein {
          from { filter: blur(3px); }
          to   { filter: blur(0px); }
      }

      /* Firefox < 16 */
      @-moz-keyframes fadein {
          from { filter: blur(3px); }
          to   { filter: blur(0px); }
      }

      /* Safari, Chrome and Opera > 12.1 */
      @-webkit-keyframes fadein {
          from { filter: blur(3px); }
          to   { filter: blur(0px); }
      }

      /* Internet Explorer */
      @-ms-keyframes fadein {
          from { filter: blur(3px); }
          to   { filter: blur(0px); }
      }

      /* Opera < 12.1 */
      @-o-keyframes fadein {
          from { filter: blur(3px); }
          to   { filter: blur(0px); }
      }
    </style>
</head>

<body class="">
  <div id="app" v-cloak>