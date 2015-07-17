<h1>Users</h1>
<?php 
    echo $this->Html->link(
        'Add User',
        array('controller' => 'users', 'action' => 'add')
    ); 
?>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['name'],
			array('controller' => 'users', 
			      'action'	   => 'view', 
                               $user['User']['id'])
		); 
	    ?>
        </td>
        <td><?php echo $user['User']['created']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $user['User']['id'])
                );
            ?>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $user['User']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>
	
