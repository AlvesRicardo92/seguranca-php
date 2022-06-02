<script type="text/javascript" src="sha512.js"></script>
<script type="text/javascript" src="forms.js"></script>
<?php
if(isset($_GET['error'])) { 
   echo 'Erro ao Logar!';
}
?>
<form action="process_login.php" method="POST" name="login_form">
   Email: <input type="text" name="email"><br>
   Password: <input type="password" name="password" id="password"><br>
   <input type="button" value="Login" onclick="formhash(this.form, this.form.password);">
   <br><a href="registrar.html">Cadastre-se</a>
</form>