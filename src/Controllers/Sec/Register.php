<?php

namespace Controllers\Sec;

use Controllers\PublicController;
use \Utilities\Validators;
use Controllers\Sec\Error;

class Register extends PublicController
{
    private $txtUser = "";
    private $txtEmail = "";
    private $txtPswd = "";
    private $errorUser = "";
    private $errorEmail = "";
    private $errorPswd = "";
    private $hasErrors = false;
    
    public function run(): void
    {
        if ($this->isPostBack()) {
            $this->txtUser = $_POST["txtUser"];
            $this->txtEmail = $_POST["txtEmail"];
            $this->txtPswd = $_POST["txtPswd"];
            
            // Validaciones
            if (!(Validators::IsValidUser($this->txtUser))) {
                $this->errorUser = "El nombre de usuario es obligatorio";
                $this->hasErrors = true;
            }
            if (!(Validators::IsValidEmail($this->txtEmail))) {
                $this->errorEmail = "El correo no tiene el formato adecuado";
                $this->hasErrors = true;
            }
            if (!Validators::IsValidPassword($this->txtPswd)) {
                $this->errorPswd = "La contraseña debe tener al menos 8 caracteres una mayúscula, un número y un caracter especial.";
                $this->hasErrors = true;
            }

            if (!$this->hasErrors) {
                try {
                    // Crear usuario
                    $userId = \Dao\Security\Security::newUsuario($this->txtUser, $this->txtEmail, $this->txtPswd);
                    
                    

                    \Utilities\Site::redirectToWithMsg("index.php?page=sec_login", "¡Usuario Registrado Satisfactoriamente!");
                    // Asignar rol al usuario
                    \Dao\Security\Security::getUnAssignedRoles();
                } catch (\Exception $ex) {
                    die($ex->getMessage());
                }
            }
        }
        
        $viewData = get_object_vars($this);
        \Views\Renderer::render("security/sigin", $viewData);
    }
}
