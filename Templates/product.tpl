{include file='Templates/header.tpl'}
<a href="">Cart</a>
{if !isset ($smarty.session.email)}
<a href="login">Login</a>
{/if}
{if isset ($smarty.session.email)}
<a href="logout">Logout</a>


 {/if}

<div class="titulo">
    <h1>{$titulo}</h1>
</div>

{if isset ($smarty.session.email)}
<div class="form-container">
    <form action="addProd" method="post">
    <div class="form-group form-producto">
        <div id="producto">
            <label>Producto</label>
            <input class="form-control" type="text" name="nombre" id="nombre">
        </div>
        <div id="categoria">
        <label>Categorias</a></label>
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
        </div>
    </div>		
    </form>
</div>
{/if}

<div class="tabla-container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th class="text-center"><a href="productos">Producto</a></th>
            <th class="text-center"><a href="categorias">Categoria</a></th>
            {if isset ($smarty.session.email)}
                <th></a></th>	
            {/if}		
            
        </tr>
        </thead>
        <tbody>
        
            {foreach from=$productos item=$producto}
                <tr>
                    <td class="text-center"> <a href="viewProd/{$producto->id}">{$producto->nombre}</a>  </td>
                    <td class="text-center"> <a href="viewCat/{$producto->id_categoria}">{$producto->categoria}</a></td>
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