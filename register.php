<?php include_once 'helpers/helper.php'; ?>

<?php subview('header.php'); ?>

<style>

body {
    background: #bdc3c7;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #3698f7, #2b868b); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


}
@font-face {
  font-family: 'product sans';
  src: url('assets/css/Product Sans Bold.ttf');
}
h3 {
    text-align: center;
    /* font-family: 'Italianno', cursive; */
    font-family: 'product sans', cursive;      
    font-weight: normal;
    font-size: 55px;
    margin-top: 20px !important;   
}

input {
    /* background-color: #F8F9FA !important; */
    margin-bottom: 10px;
    border :0px !important;
    border-bottom: 2px solid #838383 !important;
    color :#838383 !important;
    border-radius: 0px !important;
    font-weight: bold !important;
  }
  label {
    color : #838383 !important;      
    font-size: 19px;
  }
.register{
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 60px;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #4e4e4e;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>
<?php
if(isset($_GET['error'])) {
    if($_GET['error'] === 'invalidemail') {
        echo '<script>alert("Email Invalido")</script>';
    } else if($_GET['error'] === 'pwdnotmatch') {
        echo '<script>alert("As senhas não se coincidem")</script>';
    } else if($_GET['error'] === 'sqlerror') {
        echo"<script>alert('Erro na DB')</script>";
    } else if($_GET['error'] === 'usernameexists') {
        echo"<script>alert('O nome de usuário já existe')</script>";
    } else if($_GET['error'] === 'emailexists') {
        echo"<script>alert('O email já existe')</script>";
    }
}
?>
<link rel="stylesheet" href="assets/css/form.css">
<main>
<div class="container-fluid mt-0 register">
<div class="row">
    <!-- <div class="col-md-3 register-left">
        
        <h3>Welcome</h3>
    </div> -->
    <div class="col-md-1"></div>
    <div class="col-md-10 register-right">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading text-secondary">REGISTRO DE PASSAGEIROS</h3>
                <div class="register-form">
                <form method="POST" action="includes/register.inc.php">
                    <div class="conrainer-fluid">
                    <div class="row">
                        <div class="col-1 p-0">
                            <i class="fa fa-user text-secondary" 
                                style="float: right;margin-top:35px;"></i>
                        </div>
                        <div class="col-md">
                            <div class="input-group">
                                <label for="username">Usuário</label>
                                <input type="text" name="username" id="username" required />                                
                            </div>
                            <!-- <div class="input-group">
                                <label for="username">RG</label>
                                <input type="text" name="username" id="username" required />                                
                            </div>
                            <div class="input-group">
                                <label for="username">Endereço Comercial</label>
                                <input type="text" name="username" id="username" required />                                
                            </div>
                            <div class="input-group">
                                <label for="username">Telefone</label>
                                <input type="text" name="username" id="username" required />                                
                            </div>
                            <div class="input-group">
                                <label for="username">Orgão Emissor</label>
                                <input type="text" name="username" id="username" required />                                
                            </div>
                            -->
                        </div>
                        <div class="col-1 p-0 mr-2">
                            <i class="fa fa-envelope text-secondary" 
                                style="float: right;margin-top:35px;"></i>
                        </div>                    
                        <div class="col-md">
                            <div class="input-group">
                                <label for="email_id">Email</label>
                                <input type="text" name="email_id" id="email_id"
                                        required>                                         
                            </div> 
                            <!-- <div class="input-group">
                                <label for="username">CPF</label>
                                <input type="text" name="username" id="username" required />                                
                            </div>
                            <div class="input-group">
                                <label for="username">Endereço</label>
                                <input type="text" name="username" id="username" required />                                
                            </div> 
                            <div class="input-group">
                                <label for="username">Local de Trabalho</label>
                                <input type="text" name="username" id="username" required />                                
                            </div>
                            <div class="input-group">
                                <label for="username">Data de Nascimento</label>
                                <input type="text" name="username" id="username" required />                                
                            </div>                                    -->
                        </div>                        
                    </div>
                    <div class="form-row">
                    <div class="col-1 p-0">
                            <i class="fa fa-lock text-secondary" 
                                style="float: right;margin-top:35px;"></i>
                        </div>                        
                        <div class="col-md">
                            <div class="input-group">
                                <label for="password">Senha</label>
                                <input type="password" name="password" id="password"            
                                required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Deve conter pelo menos um número e uma letra maiúscula e minúscula,
                                e pelo menos 8 ou mais caracteres" />                                        
                            </div>                                     

                        </div>
                        <div class="col-1 p-0 mr-2">
                            <i class="fa fa-lock text-secondary" 
                                style="float: right;margin-top:35px;"></i>
                        </div>                        
                        <div class="col-md">
                            <div class="input-group">
                                <label for="password_repeat">Confirmar Senha</label>
                                <input type="password" name="password_repeat" 
                                    id="password_repeat" required>
                            </div>                                     
                        </div>                                                                                                  
                    </div>
                    <div class="text-center">
                        <button name="signup_submit" type="submit" 
                            class="btn btn-info mt-5">
                            <div style="font-size: 1.5rem;">
                            <i class="fa fa-lg fa-arrow-right"></i> Completar  
                            </div>
                        </button>                            
                    </div>
                    </div>
                </form>
                </div>                        
            </div>
        </div>
    </div> 
    <div class="col-md-1"></div>          
</div>
</div>

<?php subview('footer.php'); ?>
<script>
$(document).ready(function(){
  $('.input-group input').focus(function(){
    me = $(this) ;
    $("label[for='"+me.attr('id')+"']").addClass("animate-label");
  }) ;
  $('.input-group input').blur(function(){
    me = $(this) ;
    if ( me.val() == ""){
      $("label[for='"+me.attr('id')+"']").removeClass("animate-label");
    }
  }) ;
  // $('#test-form').submit(function(e){
  //   e.preventDefault() ;
  //   alert("Thank you") ;
  // })
});    
</script>
 
</main>