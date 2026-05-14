<?php require APPROOT . '/views/layouts/header.php'; ?>

<h2>Reporte de Asistencia</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>DNI</th>
    <th>Cargo</th>
    <th>Fecha</th>
    <th>Entrada</th>
    <th>Salida</th>
    <th>Estado</th>
</tr>

<?php foreach($data['asistencias'] as $a): ?>
<tr>
    <td><?= $a->id_asistencia ?></td>
    <td><?= $a->nombre ?></td>
    <td><?= $a->apellido ?></td>
    <td><?= $a->dni ?></td>
    <td><?= $a->nombre_cargo ?></td>
    <td><?= $a->fecha ?></td>
    <td><?= $a->hora_entrada ?></td>
    <td><?= $a->hora_salida ?></td>
    <td><?= $a->estado ?></td>
</tr>
<?php endforeach; ?>

</table>

<?php require APPROOT . '/views/layouts/footer.php'; ?>