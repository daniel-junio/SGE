<?php

namespace App\Classes;

include_once "app/Db/conexao.php";

use App\Db\conexao;

class Aluno{
    public  $id;
    public  $nome;
    public  $turma;
    public  $matricula;
    public $mentor;

    public function Cadastrar(){
        $server = "localhost";
        $user = "root";
        $pass = "homolog";
        $db = "escola";
        $conn = mysqli_connect($server,$user,$pass,$db);

        $sql = "INSERT INTO escola.aluno (nome, turma,matricula,mentor) ".
            "values ('$this->nome','$this->turma','$this->matricula','$this->mentor')";

        try{

            return mysqli_query($conn,$sql);
        }
        catch(Exception $err){
            echo "erro ao tentar inserir aluno: " . $err->getMessage();
        }
    }

    public static function Listar(){
        $db = new conexao();
        $conn = $db->getConnection();
        $sql = "Select aluno.id, aluno.nome,aluno.turma,prof.nome AS mentor,aluno.matricula ".
            "from escola.aluno as aluno ".
            "inner join escola.professor as prof on aluno.mentor = prof.id ".
            "order by aluno.nome asc";
        try{
            return mysqli_query($conn,$sql);
        }
        catch(Exception $err){
            echo "erro ao tentar inserir aluno: " . $err->getMessage();
        }
    }

    public static function Consultar($id){
        $db = new conexao();
        $conn = $db->getConnection();

        $sql = "Select aluno.id, aluno.nome,aluno.turma,prof.nome AS mentor,aluno.matricula ".
            "from escola.aluno as aluno ".
            "inner join escola.professor as prof on aluno.mentor = prof.id ".
            "where aluno.id = $id";
        try {
            return mysqli_query($conn,$sql);
        }
        catch(Exception $error){
            echo "Erro ao consultar aluno: ". $error->getMessage();
        }
    }

    public static function Filtrar($criterio){
        $db = new conexao();
        $conn = $db->getConnection();

        $sql = "Select * from escola.aluno ".
            " where id like ".
            "'%$criterio%' or nome like '%$criterio%' or matricula like '%$criterio%' or turma like '%criterio%' ".
            "or mentor like '%criterio%'";
        try {
            return mysqli_query($conn,$sql);
        }
        catch(Exception $error){
            echo "Ocorreu um erro no filtro realizado: ". $error->getMessage();
        }
    }

    public static function Editar(Aluno $aluno){
        $db = new conexao();
        $conn = $db->getConnection();

        $sql ="update escola.aluno set " .
            "nome = '$aluno->nome', " .
            "matricula = '$aluno->matricula', " .
            "turma = $aluno->turma, " .
            "mentor = '$aluno->mentor' " .
            "where id = $aluno->id";
        try {
            return mysqli_query($conn,$sql );
        }
        catch (Exception $error){
            echo "Ocorreu um erro ao tentar editar o registro: " . $error->getMessage();
        }
    }
    public static function Excluir($id){
        $db = new conexao();
        $conn = $db->getConnection();

        $sql ="delete from escola.aluno where id = $id";
        try {
            return mysqli_query($conn,$sql );
        }
        catch (Exception $error){
            echo "Ocorreu um erro ao tentar deletar o registro: " . $error->getMessage();
        }
    }
}