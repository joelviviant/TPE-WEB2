{include file='Templates/header.tpl'}
<a href="">Cart</a>
{if !isset ($smarty.session.email)}
<a href="login">Login</a>
{/if}
{if isset ($smarty.session.email)}
<a href="logout">Logout</a>
 {/if}
<div class="titulo">
    <h1>Categorias</h1>
</div>
{if isset ($smarty.session.email)}
<div class="form-container">
    <form action="addCat" method="post">
        <div class="form-group form-categoria">
            <div id="categoria-nombre">
                <label>Nombre</label>  
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div id="agregar-categoria">
                <div class="boton-container">
                    <input type="submit" class="btn btn-primary" id="submit" value="Agregar" name="submit">
                </div>
            </div>
        </div>
    </form>
</div>
{/if}



<div class="tabla-container-categorias">
    <table class="table table-striped">
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
                    <a href="viewCat/{$categoria->id_categoria}">{$categoria->nombre}</a>
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
