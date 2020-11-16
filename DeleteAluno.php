<?php

require __DIR__.'/vendor/autoload.php';

require_once "app/Classes/Aluno.php";
use App\Classes\Aluno;

if(isset($_POST['delete_aluno'])){
    $id = $_POST['aluno_id'];

    if(Aluno::Excluir($id)){
        header('Location: /ListAluno.php?status=success');
        exit;
    }
}
