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

    <ul class="list-group w-25 m-auto">
        {foreach from=$productos item=producto}
            <li class="list-group-item">
                <a href="viewProd/{$producto->id}">{$producto->nombre}</a>
            </li>     
        {/foreach}                     
    </ul>

{include file='Templates/footer.tpl'}