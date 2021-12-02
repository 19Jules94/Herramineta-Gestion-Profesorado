<h1 class="page-header">Acciones</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Accion&a=Crud">Nueva Accion</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th >Nombre</th>
            <th>Descripcion</th>
            <th>Borrado</th>
            <th ></th>
            <th ></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Descripcion; ?></td>
            <td><?php echo $r->Borrado; ?></td>
            <td>
                <a href="?c=Accion&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a href="?c=Accion&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>