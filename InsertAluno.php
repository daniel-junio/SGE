<?php

require __DIR__.'/vendor/autoload.php';

require_once "app/Classes/Aluno.php";
use App\Classes\Aluno;

if(isset($_POST['salvar'],$_POST['nome'],$_POST['turma'],$_POST['matricula'],$_POST['mentor'])){

    $aluno = new Aluno();
    $aluno->nome = $_POST['nome'];
    $aluno->turma = $_POST['turma'];
    $aluno->matricula = $_POST['matricula'];
    $aluno->mentor = $_POST['mentor'];

    if($aluno->Cadastrar()){
        header('Location: /ListAluno.php?status=success');
        exit;
    }
}
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Views/Aluno/InsertAluno.php";
include __DIR__ . "/Views/footer.php";