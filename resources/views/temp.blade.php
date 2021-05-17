<?php
$senha = empty($_GET['password']) ? "" : $_GET['password'];
?>

<form class="form-signin" method="POST" action="/events">
    <input type="text" name="password" class="form-control" id="form-text" placeholder="Senha a decriptografar" required autofocus>
    <span role="alert" class="error-msg" id="errormsg_0_Passwd"></span>
    <input type="submit" value="Decriptografar" class="btn btn-lg btn-primary btn-block" />
    {{--    <label><?php var_dump($hash) ?></label>--}}
    <span class="clearfix"></span>
</form>


























{{--// PARTE DA CRIPTOGRAFIA--}}
{{--use App\Actions\Fortify\CreateNewUser;--}}
{{--$create = new CreateNewUser();--}}
{{--$inputar['password'] = empty($_GET['password']) ? "123456789" : $_GET['password'];--}}
{{--//$inputar['password'] = empty($_GET['password']) ? "123456789" : $_GET['password'];--}}
{{--$inputar['name'] = empty($_GET['name']) ? "teste" : $_GET['name'];--}}
{{--$inputar['email'] = empty($_GET['email']) ? "testc@teste.teste" : $_GET['email'];--}}
{{--?>--}}

{{--<form class="form-signin" action=<?php $create->create($inputar);?>>--}}
{{--    <input type="text" name="name" class="form-control" id="form-text" placeholder="name" required autofocus>--}}
{{--        <span role="alert" class="error-msg" id="errormsg_0_Passwd"></span>--}}
{{--    <input type="text" name="email" class="form-control" id="form-text" placeholder="email" required autofocus>--}}
{{--        <span role="alert" class="error-msg" id="errormsg_0_Passwd"></span>--}}
{{--    <input type="text" name="password" class="form-control" id="form-text" placeholder="password" required autofocus>--}}
{{--        <span role="alert" class="error-msg" id="errormsg_0_Passwd"></span>--}}
{{--    <span role="alert" class="error-msg" id="errormsg_0_Passwd"></span>--}}
{{--    <input type="submit" value="Registrar usuario" class="btn btn-lg btn-primary btn-block" />--}}
{{--    <label></label>--}}
{{--    <span class="clearfix"></span>--}}
{{--</form>--}}


