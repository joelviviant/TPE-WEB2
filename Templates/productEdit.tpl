{include file='Templates/header.tpl'}



    <h1 class="titulo">{$titulo}</h1>

<div class="form-container">
    <form action="updateProd" method="post" enctype="multipart/form-data" >
        <div class="form-group form-productoDetail">
            <div id="producto">
                <label><a class="text-dark"  href="productos">Producto</a></label>
                <input type="text" class="form-control" name="nombre" value="{$producto->nombre}" id="nombre">
                <label class="navbar-brand" >Cantidad</label>
                <input type="number" class="form-control" name="cantidad" value="{$producto->cantidad}" id="cantidad">
                <label class="navbar-brand" >Marca</label>
                <input type="text" class="form-control" name="marca" value="{$producto->marca}" id="marca">
                
                <label class="navbar-brand" >Adjuntar imagen</label>
                <input class="form-control" type="file" name="input_name" value="{$producto->imagen}" id="imageToUpload">

                <input hidden name="id" value="{$producto->id}" id="id">
            </div>

            <div id="categoria">
                <label><a class="text-dark" href="categorias">Categoria</a></label>
                <select class="form-control" name="categoria" id="categoria"> 
                    {foreach from=$categories item=category}
                        {if $category->id_categoria eq $producto->id_categoria}
                        <option selected value="{$category->id_categoria}">{$category->nombre}</option>
                        {else}
                        <option value="{$category->id_categoria}">{$category->nombre}</option>
                        {/if}
                    {/foreach}                                  
                </select>
            </div>
            <div id="agregar">
                <div class="boton-container">
                    <input type="submit" id="submit" class="btn btn-primary" value="Guardar" name="submit">
                </div>
                <p class="text-danger">{$error}</p>
            </div>
        </div>			
    </form>
</div>
{include file='Templates/footer.tpl'}
