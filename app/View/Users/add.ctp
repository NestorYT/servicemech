<h1>Add Users</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('name');
echo $this->Form->input('note', array('rows' => '3'));
echo $this->Form->end('Add User');
?>
