<?php

include "app/Classes/Professor.php";
use App\Classes\Professor as prof;

$mentor = new prof();
$mentores = prof::Listar();


?>

<div class="row">
    <h5>
        <i class="fas fa-bars"></i> Criar Registro
    </h5>
</div>
<rh />
<div class="row">
    <div class="col-md-12">
            <form action="../../InsertAluno.php" method="POST">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="control-label">Nome</label>
                        <input type="text" name="nome" class="form-control" required/>
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="control-label">Turma</label>
                        <input name="turma" class="form-control" required/>
                        <span  class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label  class="control-label">Mentor</label>
                        <select required name="mentor" class="custom-select form-control">
                            <option></option>
                            <?php while($dado = $mentores->fetch_array()){?>
                                <option value="1"><?php echo $dado["nome"];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="control-label" >Matrícula</label>
                        <input name="matricula" class="form-control" required/>
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
