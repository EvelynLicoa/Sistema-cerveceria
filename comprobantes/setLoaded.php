<?php


   $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');

   $stament = $conn->prepare("update renglon set cargado='true'");
   echo $stament->execute();
   $stament = null;




