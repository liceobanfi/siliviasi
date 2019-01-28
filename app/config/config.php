<?php

/**
 * CONFIGURATION VARIABLES
 * ATTENZIONE: non includere modifiche con informazioni sensibili in futuri commit
 * è possibile configurare git per ignorare automaticamente qualsiasi modifica locale al file.
 * Per farlo, dopo essersi assicurati che app/config.php è il percorso corretto di questo file, scrivere:
 * git update-index --assume-unchanged app/config.php
 *
 */
return array(
  //DATABASE CONFIGURATION
  'dbHost' => 'localhost',
  'dbName' => 'silviasi_db',
  'dbUsername' => 'root',
  'dbPassword' => '',
  //MAIL CONFIGURATION
  'smtpHost' => '',
  'smtpUsername' => '',
  'smtpPassword' => '',
  //ADMIN CONFIGURATION
  //default id: 'admin' - bcrypt hash
  //generate your own hash with the utility page in tests/password-hash.php?password=YOURPASSWORD
  'adminId' => '$2y$13$G86OHLKLGMn8IutECN86Pu7fnXaS8ExD0hdIPqxjVtr/c50xYGg5C'
);
