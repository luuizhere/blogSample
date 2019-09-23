
<div class="content p-1">
<?php echo $this->Form->create('User'); ?>
                <div class="list-group-item">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <h2 class="display-4 titulo">Cadastrar Usuário</h2>
                        </div>
                        
                    </div><hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><span class="text-danger">*</span> Nome</label>
								<?php echo $this->Form->input('name',['class'=>'form-control','label'=>false,'placeholder'=>'Seu nome']);?>
                            </div>
                            <div class="form-group col-md-6">
                                <label><span class="text-danger">*</span> E-mail</label>
								<?php echo $this->Form->input('email',['class'=>'form-control','label'=>false,'placeholder'=>'Seu melhor email']); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Username</label>
								<?php echo $this->Form->input('username',['class'=>'form-control','placeholder'=>'Seu usuario','label'=>false]);?>
							</div>
                            <div class="form-group col-md-6">
                                <label>Senha</label>
								<?php echo $this->Form->input('password',['class'=>'form-control','placeholder'=>'Senha com mínimo 8 caracteres','label'=>false]); ?>
                            </div>
                        </div>
						<?php 
									echo $this->Form->hidden('status', ['value' => 1]);
									echo $this->Form->hidden('password_ini',['value' => 'DEFAULT']);
									echo $this->Form->hidden('groups_id',['value'=> 3]); // value 3 = USERS
						?>
                       

                        <p>
                            <span class="text-danger">* </span>Campo obrigatório
                        </p>
						<?php echo $this->Form->button(__('Cadastrar'),['class'=>'btn btn-primary']); ?>
						<?php echo $this->Form->end(); ?>

                </div>
            </div>
        </div>



