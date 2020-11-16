<?php

use App\Classes\Aluno;

$alunos = Aluno::Listar();

$mensagem = '';
if(isset($_GET['status'])){
    switch ($_GET['status']){
        case 'success';
        $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;
        case 'error';
        $mensagem = '<div class="alert alert-success">Erro ao executar ação!></div>';
        break;
    }
}
?>
<div">
    <h5>
        <i class="fas fa-bars"></i> Listagem de Alunos
    </h5>
</div>
<br />
<div class="form-row">

    <div class="col-md-2 col-sm-12" style="margin-top: 5px; margin-bottom: 5px;">
        <a href="InsertAluno.php" class="btn-success btn">Novo Aluno</a>
    </div>
    <div class="col-md-4 col-sm-12"></div>
    <div class="col-md-5 col-sm-12" style="margin-top: 5px; margin-bottom: 5px;">
        <form method="get">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-actions no-color">
                        <input name="pesquisar" class="form-control form-control-sm " style="text-align:left" type="text" name="SearchString" placeholder="Pesquisar" />
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-secondary btn-sm btn-pesquisar"><i class="fas fa-search"></i></button>
                </div>
                <div class="col-md-2">
                    <a  href="ListAluno.php" class="btn btn-secondary btn-sm" style="text-align:left"><i class="fas fa-sync"></i></a>
                </div>
            </div>
        </form>
    </div>

</div>
<br />
<div class="row">

    <div class="col-12">
        <table class="box-list table-hover table table-responsive-md">
            <?=$mensagem?>
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Turma</th>
                <th>Mentor</th>
                <th>Matricula</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            while($aluno = $alunos->fetch_array()){?>
            <tr>
                <td class="aluno_id"><?php echo $aluno['id']; ?></td>
                <td><?php echo $aluno["nome"];?></td>
                <td><?php echo $aluno["turma"];?></td>
                <td><?php echo $aluno["mentor"];?></td>
                <td><?php echo $aluno["matricula"];?></td>
                <td> <a class="btn btn-success" href="EditAluno.php?id=<?php echo $aluno["id"];?>">Editar</a> </td>
                <td> <a class="btn btn-danger delete_btn" >Excluir</a> </td>
                <?php } ?>
            </tr>
            </tbody>
        </table>
    </div>
    <style>
        td {
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>

    <!-- Modal -->
    <div class="modal fade" id="modalExclusao" tabindex="-1" role="dialog" aria-labelledby="deleteAlunoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAlunoLabel">Exclusão de aluno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../../DeleteAluno.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="aluno_id" id="delete_id">
                    <h4>Deseja Excluir o aluno ? </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="delete_aluno" class="btn btn-danger">Excluir</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $('.delete_btn').click(function (e){
            e.preventDefault();
            var aluno_id = $(this).closest('tr').find('.aluno_id').text();
            $('#delete_id').val(aluno_id);
            $('#modalExclusao').modal('show');
        })
    })
</script>