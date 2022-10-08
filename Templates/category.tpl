{include file='Templates/header.tpl'}



    <h1 class="titulo">Categoria : {$category->nombre}</h1>
</div>
<div class="titulo">
    <h1 class="titulo">Productos : </h1> 
</div>
<ul class="list-group w-25 m-auto">
    {foreach from=$productos  item=producto}
         <li class="list-group-item">
         <a class="navbar-brand" href="viewProd/{$producto->id}">{$producto->nombre}</a>
         </li>
    {/foreach}
</ul>

{include file='Templates/footer.tpl'}