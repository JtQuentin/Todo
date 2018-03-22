<?php
echo validation_errors();
echo form_open(base_url('Todo/Modifier/'.$id));
echo form_label('Tâche : ','task');
echo form_input('task',set_value('task',$tache));
echo form_label('Ordre : ','ordre');
echo form_input('ordre',set_value('ordre',$order));
echo form_submit('Modifier','Modifier');
echo form_close();
