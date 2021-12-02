<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Accion">Acciones</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=Accion&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Ingrese dato de nombre" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion" value="<?php echo $alm->descripcion; ?>" class="form-control" placeholder="Ingrese descripcion" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Borrado</label>
        <input type="text" name="borrado" value="<?php echo $alm->borrado; ?>" class="form-control" placeholder="Ingrese dato de borrado" data-validacion-tipo="requerido|email" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-accion").submit(function(){
            return $(this).validate();
        });
    })
</script>