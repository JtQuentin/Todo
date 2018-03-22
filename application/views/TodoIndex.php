<!DOCTYPE html>

<html lang="fr">
    <head>
        
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>
    </head>
    <body>
        <h1><?php echo $title ?></h1>
        <?php foreach ($todos as $todo):
            if ($todo['completed']==1){ 
        ?>
            <s><?php echo $todo['task']; ?></s>
            <a href="<?php echo base_url('Todo/aFaire/'.$todo['id'])?>"> Fait</a>
            <a href="<?php echo base_url('Todo/modifier/'.$todo['id'])?>"> Modifier</a>
            <a href="<?php echo base_url('Todo/delete/'.$todo['id'])?>"> Supprimer</a></br>
         <?php   
         
    }
        else {
            echo $todo['task']; ?>
            <a href="<?php echo base_url('Todo/fait/'.$todo['id'])?>"> A faire</a>
            <a href="<?php echo base_url('Todo/modifier/'.$todo['id'])?>"> Modifier</a>
            <a href="<?php echo base_url('Todo/delete/'.$todo['id'])?>"> Supprimer</a></br>
         <?php
       
        }
?>
           
           <?php endforeach; ?>
           </br><a href="<?php echo base_url('Todo/Add');?>">Ajouter</a>
           <a href="<?php echo base_url('Todo/reordonner');?>"> Réordonner les tâches </a>
    </body>
</html>
