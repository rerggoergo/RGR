<?php include("includes/header.php"); ?>

<form action="update.php"  method="post" >
<div class="mregister">
  <div id="login">
    <h3>Выберите таблицу:</h3>
    <select name="table" id="table">
      <option value="cars" <?php if (isset($_POST['table']) &&($_POST['table'] == 'cars')){echo "selected='selected'";}?>>Автомобили</option>
      <option value="customers" <?php if (isset($_POST['table']) &&($_POST['table'] == 'customers')){echo "selected='selected'";}?>>Клиенты</option>
      <option value="orders" <?php if ( isset($_POST['table'])&&($_POST['table'] == 'orders')){echo "selected='selected'";}?>>Заказы</option>
      <option value="requests" <?php if ( isset($_POST['table'])&&($_POST['table'] == 'requests')){echo "selected='selected'";}?>>Запросы</option>
    </select>

    <span class="submit"><input class="button" id="submit" name= "submit" type="submit" value="Просмотреть"></span>
    <span class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить строку в таблицу"></span>


    <br>
    <br>

    <?php 

    if(isset($_POST["submit"])){
      $request = $_POST['table'];
      $line = mysqli_query($con,"SELECT * FROM ".$request."");
      $a = mysqli_num_fields($line);
      $line = mysqli_fetch_all($line);
    }
      if(isset($_POST["delete"])){
    $request = $_POST['table'];
    $num =$_POST['num'];
    if(!is_numeric($num )){
      echo "Проверьте правильность введенных данных! ID должно быть числом!";
    }
    else{
      $id = "id";
      $del = mysqli_query($con, "DELETE FROM ".$request." WHERE  ".$id." = ".$num."");
      }
  }










    else if (isset($_POST["change"])){
    $request = $_POST['table'];
    $num1 =$_POST['num1'];
    if(!is_numeric($num1 )){
      echo "Проверьте правильность введенных данных! ID должно быть числом!";
    }
    ?> <form action="" method="post">
      <input  type="hidden" name="num1" value="<?=$num1?>">
      <input  type="hidden" name="request" value="<?=$request?>">
      <?php
      if($request == "cars"){
        $upd = mysqli_query($con,  "SELECT * FROM cars WHERE id = '$num1'");
        $upd = mysqli_fetch_all($upd);
        foreach ($upd as $upd) {   
          ?> 
          <input disabled type="text" name="change1" placeholder="ID = [<?=  $upd[0] ?>]"> 
          <input  type="text" name="change1" value="<?=  $upd[1] ?>">  
          <input  type="text" name="change2" value="<?= $upd[2] ?>">  
          <input  type="text" name="change3" value="<?=  $upd[3] ?>">  
          <input type="text" name="change4" value="<?=  $upd[4] ?>">
          <span class="submit"><input class="button" id="save" name= "save" type="submit" value="Сохранить"></span>
          <span class="submit"><input class="button" id="cancel" name= "cancel" type="submit" value="Отмена"></span> 
          <?php
        }
      }else if($request == "customers"){
        $upd = mysqli_query($con,  "SELECT * FROM customers WHERE id = '$num1'");
        $upd = mysqli_fetch_all($upd);
        foreach ($upd as $upd) {   
          ?> 
          <input disabled type="text" name="change1" placeholder="ID = [<?=  $upd[0] ?>]"> 
          <input  type="text" name="change1" value="<?=  $upd[1] ?>">  
          <input  type="text" name="change2" value="<?= $upd[2] ?>">
          <input  type="text" name="change3" value="<?= $upd[3] ?>">    

          <input type="text" name="change4" value="<?= $upd[5] ?>">
          <span class="submit"><input class="button" id="save" name= "save" type="submit" value="Сохранить"></span> 
          <span class="submit"><input class="button" id="cancel" name= "cancel" type="submit" value="Отмена"></span>
          <?php
        }
      }
      else if($request == "orders"){
        $upd = mysqli_query($con,  "SELECT * FROM orders WHERE id = '$num1'");
        $upd = mysqli_fetch_all($upd);
        foreach ($upd as $upd) {   
          ?> 
          <input disabled type="text" name="change1" placeholder="ID = [<?=  $upd[0] ?>]">
          <input  type="text" name="change1" value="<?=  $upd[1] ?>">  
          <input  type="text" name="change2" value="<?= $upd[2] ?>">   
          <input  type="text" name="change2" value="<?= $upd[3] ?>">  
          <span class="submit"><input class="button" id="save" name= "save" type="submit" value="Сохранить"></span> 
          <span class="submit"><input class="button" id="cancel" name= "cancel" type="submit" value="Отмена"></span>
          <?php
        }
      }
      else if($request == "requests"){
        $upd = mysqli_query($con,  "SELECT * FROM requests WHERE id = '$num1'");
        $upd = mysqli_fetch_all($upd);
        foreach ($upd as $upd) {   
          ?> 
          <input disabled type="text" name="change1" placeholder="ID = [<?=  $upd[0] ?>]">
          <input  type="hidden" name="num1" value="<?=$num1?>">
          <input  type="text" name="change1" value="<?=  $upd[1] ?>">  
          <input  type="text" name="change2" value="<?= $upd[2] ?>">   
          <input  type="text" name="change3" value="<?=  $upd[3] ?>"> 
          <span class="submit"><input class="button" id="save" name= "save" type="submit" value="Сохранить"></span>
          <span class="submit"><input class="button" id="cancel" name= "cancel" type="submit" value="Отмена"></span> 
          <?php
        }
      }
      ?></form><?php  
    }
    else if (isset($_POST["save"])) {
      $request = $_POST['request'];
      $num1 =$_POST['num1'];
     
      if ($request == "cars") {
        $change1 =$_POST["change1"];
        $change2 =$_POST["change2"];
        $change3 =$_POST["change3"];
        $change4 =$_POST["change4"];
        mysqli_query($con, "UPDATE cars SET number = '$change1', price = '$change2', name= '$change3', engine= '$change4' WHERE id = ".$num1."");
      }else if ($request == "customers") {
        $change1 =$_POST["change1"];
        $change2 =$_POST["change2"];
        $change3 =$_POST["change3"];
        $change4 =$_POST["change4"];
}
mysqli_query($con, "UPDATE customers SET name = '$change1', email = '$change2', role = '$change3', password = '$change4' WHERE id = ".$num1."");
      }
      else if ($request == "orders") {
        $change1 =$_POST["change1"];
        $change2 =$_POST["change2"];
        $change2 =$_POST["change3"];
        mysqli_query($con, "UPDATE dishes SET data = '$change1', customer_id = '$change2', car_id = '$change3' WHERE id = ".$num1."");
      }
      else if ($request == "requests") {
        $change1 =$_POST["change1"];
        $change2 =$_POST["change2"];
        $change3 =$_POST["change3"];
        mysqli_query($con, "UPDATE orders SET customer_id = '$change1', car_id = '$change2', text = '$change3' WHERE id = ".$num1."");
      }
       // echo "Изменения сохранены!";
      ?>
      















 



















?>


      <?php
       if (isset($_POST["add"])){
      $request = $_POST['table'];
      ?> <form action="" method="post">
      <input  type="hidden" name="request" value="<?=$request?>">
      <?php
      if ($request == "cars") {
        ?>
        <input  type="text" name="new1" placeholder ="Номер">  
        <input  type="text" name="new2" placeholder="Цена"> 
        <input  type="text" name="new3" placeholder="Название">
        <input  type="text" name="new4" placeholder="Двигатель">
        <span class="submit"><input class="button" id="saveadd" name= "saveadd" type="submit" value="Добавить"></span> 
        <span class="submit"><input class="button" id="cancel" name= "cancel" type="submit" value="Отмена"></span>
        <?php
      }
      else if ($request == "customers") {
        ?>
        <input  type="text" name="new1" placeholder ="Имя">
         <input  type="text" name="new2" placeholder ="EMail">  

        <input  type="text" name="new3" placeholder="Роль">
        <input  type="text" name="new4" placeholder= "Пароль">
        <span class="submit"><input class="button" id="saveadd" name= "saveadd" type="submit" value="Добавить"></span> 
        <span class="submit"><input class="button" id="cancel" name= "cancel" type="submit" value="Отмена"></span>
        <?php
      }
      else if ($request == "orders") {
        ?>
        <input  type="text" name="new1" placeholder ="Дата">  
        <input  type="text" name="new2" placeholder="ID пользователя"> 
        <input  type="text" name="new3" placeholder="ID автомобиля"> 
        <span class="submit"><input class="button" id="saveadd" name= "saveadd" type="submit" value="Добавить"></span> 
        <span class="submit"><input class="button" id="cancel" name= "cancel" type="submit" value="Отмена"></span>
        <?php
      }
      else if ($request == "requests") {
        ?>
        <input  type="text" name="new1" placeholder ="ID пользователя">  
        <input  type="text" name="new2" placeholder="ID машины"> 
        <input  type="text" name="new3" placeholder="Требования"> 
        <span class="submit"><input class="button" id="saveadd" name= "saveadd" type="submit" value="Добавить"></span> 
        <span class="submit"><input class="button" id="cancel" name= "cancel" type="submit" value="Отмена"></span>
        <?php
      }
      ?></form><?php
    } else if (isset($_POST["saveadd"])) {
      $request = $_POST['request'];
      
      if ($request == "cars") {
        $change1 =$_POST["new1"];
        $change2 =$_POST["new2"];
        $change3 =$_POST["new3"];
        $change4 =$_POST["new4"];
        mysqli_query($con,"INSERT INTO cars(number, price, name, engine) VALUES ('$change1', '$change2', '$change3', '$change4')");
      }
      else if ($request == "customers") {
        $change1 =$_POST["new1"];
        $change2 =$_POST["new2"];
        $change3 =$_POST["new3"];
        $change4 =$_POST["new4"];
        mysqli_query($con,"INSERT INTO customers(name, email, role, password) VALUES ('$change1', '$change2', '$change3', '$change4')");
      }
      else if ($request == "orders") {
        $change1 =$_POST["new1"];
        $change2 =$_POST["new2"];
        $change3 =$_POST["new3"];
        mysqli_query($con,"INSERT INTO orders(data, customer_id, car_id) VALUES ('$change1', '$change2', '$change3')");
      }
      else if ($request == "requests") {
        $change1 =$_POST["new1"];
        $change2 =$_POST["new2"];
        $change3 =$_POST["new3"];
        mysqli_query($con,"INSERT INTO requests(customer_id, car_id, text) VALUES ('$change1', '$change2', '$change3')");
      }
      echo "Успешно добавлено!";

    }
      
?>

      <table> 
        <span style="font-weight: 600; color: black;">ID</span>
        <?php 
        foreach ($line as $line) { 
          ?>
          <tr>
            <?php
            for ($i=0; $i < $a; $i++) {;
              ?> <td > <?php echo  
              $line[$i]; ?> </td> <?php
            }
            ?> 



          </tr>
          <?php   
        }
        ?>
      </table>
      <?php

      ?>
      <span style="font-weight: 600; ">Введите ID строки, которую хотите  <span style="font-weight: 700;">УДАЛИТЬ:</span></span>
      <input type="text" name="num" id="num" value="">
      <span class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"></span>
      <span style="font-weight: 600; ">Введите ID строки, которую хотите <span style="font-weight: 700;">ИЗМЕНИТЬ:</span></span>
      <input type="text" name="num1" id="num1" value="">
      <span class="submit"><input class="button" id="change" name= "change" type="submit" value="Изменить"></span>
    </form>


    
    
