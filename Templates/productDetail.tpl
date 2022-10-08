{include file='Templates/header.tpl'}

<h1 class="titulo">{$titulo}</h1>

    <div id="producto"  data-id="{$producto->id}">
        <h2 class="text-center">Producto: {$producto->nombre}</h2> 
    </div>
    <h2 class="text-center">Categoria: {$producto->categoria}</h2>

{include file='Templates/footer.tpl'}