{include file='Templates/header.tpl'}
<a href="">Cart</a>
{if !isset ($smarty.session.email)}
<a href="login">Login</a>
{/if}
{if isset ($smarty.session.email)}
<a href="logout">Logout</a>
 {/if}


<div class="titulo" id="categoria" data-id="{$category->id_categoria}">
    <h1>Categoria:{$category->nombre}</h1>
</div>
<div class="titulo">
    <h2>Productos:</h2> 
</div>
<ul class="list-group w-25 m-auto">
    {foreach from=$productos  item=producto}
         <li class="list-group-item">
         <a href="viewProd/{$producto->id}">{$producto->nombre}</a>
         </li>
    {/foreach}
</ul>

{include file='Templates/footer.tpl'}