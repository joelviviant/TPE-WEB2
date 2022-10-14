{include file='Templates/header.tpl'}



<h1 class="titulo">{$titulo}</h1>


{if isset ($smarty.session.email)}
<div class="form-container">
    <form action="addProd" method="post" enctype="multipart/form-data">
    <div class="form-group form-producto">
        <div id="producto">
            <label class="navbar-brand" >Producto</label>
            <input class="form-control" type="text" name="nombre" id="nombre">
        </div>
        <div id="cantidad">
            <label class="navbar-brand" >Cantidad</label>
            <input class="form-control" type="number" name="cantidad" id="cantidad">
        </div>
        <div id="marca">
            <label class="navbar-brand" >Marca</label>
            <input class="form-control" type="text" name="marca" id="marca">
        </div>
        <div id="imagen">
        <label class="navbar-brand" >Adjuntar imagen</label>
        <input class="form-control" type="file" name="input_name" value="" id="imageToUpload">
        </div>
        <div id="categoria">
        <label class="navbar-brand">Categorias</a></label>
            <select class="form-control" name="categoria" id="categoria">
                {foreach from=$categorias item=$categoria}
                    <option value="{$categoria->id_categoria}">{$categoria->nombre}</option>   
                {/foreach}                                                     
            </select>
        </div>
        <div id="agregar">
            <div class="boton-container">
                <input type="submit" id="submit" value="Agregar" class="btn btn-primary" name="submit">
            </div>
            <p class="text-danger">{$error}</p>
        </div>
        
    </div>		
    </form>
</div>
{/if}

<div class="tabla-container">
    <table class="table table-dark">
        <thead>
        <tr>
            <th class="text-center"><a class="text-info" href="productos">Producto</a></th>
            <th class="text-center"><a id="title-marca" >Marca</a></th>	
            <th class="text-center"><a class="text-success" href="categorias">Categoria</a></th>
            {if isset ($smarty.session.email)}
            <th></th>
             {/if}
         	
            
        </tr>
        </thead>
        <tbody>
        
            {foreach from=$productos item=$producto}
                <tr>
                    <td class="text-center"> <a class="text-white bg-dark"  href="viewProd/{$producto->id}">{$producto->nombre}</a>  </td>
                    <td class="text-center"> <a class="text-white bg-dark" >{$producto->marca}</a></td>
                    <td class="text-center"> <a class="text-white bg-dark" href="viewCat/{$producto->id_categoria}">{$producto->categoria}</a></td>
                    {if isset ($smarty.session.email)}
                        <td class="text-center"> 
                            <a href="deleteProd/{$producto->id}" class="material-icons text-decoration-none text-danger" >delete</a>
                            <a href="editProd/{$producto->id}" class="material-icons text-decoration-none text-warning">edit</a> 
                        </td>
                    {/if}
                </tr>

            {/foreach}  
            
        
        </tbody>
    </table>
</div>



{include file='Templates/footer.tpl'}