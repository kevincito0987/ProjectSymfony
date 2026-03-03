<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $continente->get() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $continente->get() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('continente/edit?id='.$continente->get()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('continente/index') ?>">List</a>
