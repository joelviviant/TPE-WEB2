{include file='Templates/header.tpl'}


<h1 class="titulo">{$titulo}</h1>

<form class="w-25 m-auto" action="updateCat" method="post">
    <label>
        <a class="text-dark"  href="producto">Categoria</a>
    </label>
    <input class="form-control" type="text" class="form" name="nombre" value="{$categorias->nombre}"id="nombre">
    <input hidden name="id" value="{$categorias->id_categoria}"id="id">
    <div class="boton-container">
        <input type="submit"  class="btn btn-primary my-2" id="submit" value="Guardar" name="submit">
    </div>		
</form>


{include file='Templates/footer.tpl'}

