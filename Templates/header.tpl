<!DOCTYPE html>
<html lang="en">
<head>
      <base href="{BASE_URL}" />
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Inventario Columbia</title>
      <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="./Css/styles.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>
<nav  class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
  <a href=""><img  width="50" height="50"  src="./Images/inventario.png"></a>
    {if !isset ($smarty.session.email)}
      <a class="navbar-brand" href="login">Login</a>
      {/if}
      {if isset ($smarty.session.email)}
      <a class="navbar-brand" href="logout">Logout</a>
       {/if}
  </div>
</nav>

<body> 


         
             