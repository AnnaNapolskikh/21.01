<?php

  $connect = mysqli_connect('localhost', 'root', '', 'dbase');
  if(!$connect) {
    die('Error connect to database');
  }