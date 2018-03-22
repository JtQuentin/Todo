<?php
echo validation_errors();
echo form_open(base_url('Todo/Reordonner'));
$compte = 10;
?>
<html lang="fr">
    <head>
        
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>
    </head>
    <body>
        <h1><?php echo $title ?></h1>
        <?php foreach ($todos as $todo): 
            echo form_label('','ordre');
            echo form_input('ordre[]',set_value('ordre[]',$compte));
            echo $todo['task'];
            $compte += 10;
            ?></br>
            <?php endforeach;
            echo form_submit('Reordonner','Reordonner');?>
    </body>
</html>