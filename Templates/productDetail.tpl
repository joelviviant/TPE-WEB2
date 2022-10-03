{include file='Templates/header.tpl'}
<a href="/web2">Carrito</a>
{if !isset ($smarty.session.email)}
<a href="login">Login</a>
{/if}
{if isset ($smarty.session.email)}
<a href="logout">Logout</a>

 {/if}

    <h1>{$titulo}</h1>
    <div id="producto" class="m-auto" data-id="{$producto->id}">
        <h2 class="text-center">Producto: {$producto->nombre}</h2> 
    </div>
    <h2 class="text-center">Categoria: {$producto->categoria}</h2>

   

{include file='Templates/footer.tpl'}