{include file='Templates/header.tpl'}


<h1 class="titulo">{$titulo}</h1>

    <ul  class="list-group w-25 m-auto">
        {foreach from=$productos item=producto}
            <li class="list-group-item">
                <a class="navbar-brand"  href="viewProd/{$producto->id}">{$producto->nombre}</a>
            </li>     
        {/foreach}                     
    </ul>

{include file='Templates/footer.tpl'}