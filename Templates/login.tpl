{include file='Templates/header.tpl'}




<form class="w-25 m-auto d-flex flex-column" action="verify" method="post">
    <input class="form-control mb-2" placeholder="email" type="text" name="email" id="email" required>
    <input class="form-control mb-2" placeholder="password" type="password" name="password" id="password" required>
    <input class="btn btn-primary mb-2" type="submit" id="submit" value="Login" name="submit">			
</form>
<div class="text-center"  >
    <h4>{$error}</h4>
</div>



{include file='Templates/footer.tpl'}