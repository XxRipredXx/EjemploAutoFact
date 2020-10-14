<!DOCTYPE html>
<html>
    <?php
    
    include('config.php');
    session_start();
    
    if (isset($_POST['login'])) {
    
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $query = $connection->prepare("SELECT * FROM users WHERE EMAIL=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        if (!$result) {
            echo '<p class="error">Combinacion erronea</p>';
                
            $logmessage =  '[' . date('Y-m-d h:i:s') .' . "Usuario: " .  '.$email.'] '. "Credenciales incorrectas" . "\n";
            error_log($logmessage, 3,  './errores.log');      
            
        } else {

            $_SESSION['user_id'] = $result['id'];
            $_SESSION['tipo_usuario'] = $result['tipo'];

            if($result['tipo'] == 'admin'){
                header('Location: resumen_admin.php');
            }else if($result['tipo'] == 'user'){
                header("Location: http://localhost/autofact/formulario.php");
                echo '<p class="success">Usuario logueado</p>';
            }
        }
    }
    
    
    ?>

    
    <head>
        <title>Autofact</title>
                
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>

    <br>
    <h1>Login</h1>
    <br>
    <form method="post" action="" name="signin-form" class="form-control">
        <div class="form-group col-sm-2">
            <label>Email</label>
            <input type="text" name="email" required class="form-control" placeholder="Ingresa Email"/>
        </div>
        <div class="form-group col-sm-2" >
            <label>Contraseña</label>
            <input type="password" name="password" required class="form-control" placeholder="Ingresa Contraseña"/>
        </div>
        <div class="form-group col-sm-2" >
            <button type="submit" name="login" value="login" class="btn btn-primary">Log In</button>
        </div>
        
    </form>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    </body>
</html>