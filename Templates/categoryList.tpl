{include file='Templates/header.tpl'}

{if isset ($smarty.session.email)}
<h1 class="titulo">{$titulo}</h1>
{/if}

{if isset ($smarty.session.email)}
<div class="form-container">
    <form action="addCat" method="post">
        <div class="form-group form-categoria">
            <div id="categoria-nombre">
                <label class="text-center">Nombre</label>  
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div id="agregar-categoria">
                <div class="boton-container">
                    <input type="submit" class="btn btn-primary" id="submit" value="Agregar" name="submit">
                </div>
                <p class="text-danger">{$error}</p>
            </div>
        </div>
    </form>
</div>
{/if}



<div class="tabla-container-categorias">
    <h1 class="titulo">Categorias</h1>
    <table class="table table-dark">
     <thead>
        <tr>
            <th class="text-center" >Categoria</a></th>
            {if isset ($smarty.session.email)}
                <th></a></th>	
            {/if}	
        </tr>
    </thead>  
    <tbody> 
        {foreach from=$categorias item=categoria}
            <tr>
                <td class="text-center">
                    <a class="text-success" href="viewCat/{$categoria->id_categoria}">{$categoria->nombre}</a>
                </td>
                    {if isset ($smarty.session.email)}
                    <td class="text-center">
                        <a href="deleteCat/{$categoria->id_categoria}" class="material-icons text-decoration-none text-danger" >delete</a>
                        <a href="editCat/{$categoria->id_categoria}" class="material-icons text-decoration-none text-warning">edit</a> 
                    </td>
                    {/if}
             <tr>
        {/foreach}
     </tbody>
    </table>
</div>




{include file='Templates/footer.tpl'}
