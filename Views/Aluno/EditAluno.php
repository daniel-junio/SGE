<?php

//require_once "app/Classes/Aluno.php";
use App\Classes\Aluno;


$aluno = Aluno::Consultar($_GET['id']);
$aluno = $aluno->fetch_assoc();
?>

<div class="row">
    <h5>
        <i class="fas fa-bars"></i> Editar Registro
    </h5>
</div>
<rh />
<div class="row">
    <div class="col-md-12">
            <form action="../../EditAluno.php" method="POST">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $aluno["id"];?>" required />
                </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="control-label">Nome</label>

                        <input name="nome" class="form-control" value="<?php echo $aluno["nome"];?>" required />
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="control-label">Turma</label>
                        <input name="turma" class="form-control" value="<?php echo $aluno["turma"];?>" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label  class="control-label">Mentor</label>
                        <select required name="mentor" class="custom-select form-control">
                            <option></option>
                                <option value="1" ><?php echo $aluno["mentor"];?> </option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="control-label">Matrícula</label>
                        <input name="matricula" class="form-control" value="<?php echo $aluno["matricula"];?>" required/>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <br />
            <hr />
            <div class="row">
                <div class="col-9">
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <a href="ListAluno.php" class="btn-secondary btn" ><i class="fas fa-chevron-left"></i> Voltar</a>
                        <button type="submit" name="salvar" class="btn btn-success"><i class="fas fa-check"></i> Salvar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
