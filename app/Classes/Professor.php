<?php

namespace App\Classes;

include_once "app/Db/conexao.php";

use App\Db\conexao;
use App\Db\conexao as conection;

class Professor{
    private int $id;
    private string $nome;
    private string $matricula;
    private Materia $materia;

    public function Cadastrar(Professor $prof){
        $db = new conection();
        $conn = $db->getConnection();

        $sql = "Insert into escola.professor (nome,matricula,materia) values ($prof->nome, $prof->matricula, $prof->materia)";

        try {
            mysqli_query($conn,$sql);
        }
            catch(Exception $error){
            echo "Ocorreu um erro ao tentar se conectar ao servivdor: ". $error->getMessage();
        }
    }

    public static function Listar(){
        $db = new conection();
        $conn = $db->getConnection();

        $sql = "Select * from escola.professor";

        try {
            return mysqli_query($conn,$sql);
        }
        catch(Exception $error){
            echo "Ocorreu um erro ao tentar selecionar os mentores: ". $error->getMessage();
        }
    }
    public function Editar(Professor $prof){
        $db = new conexao();
        $conn = $db->getConnection();

        $sql = "update escola.professor set nome = $prof->nome, matricula = $prof->matricula, materia = $prof->materia ";

        try {
           return mysqli_query($conn,$sql);
        }
        catch(Exception $error){
            echo "Erro ao editar Professor". $error->getMessage();
        }
    }
}