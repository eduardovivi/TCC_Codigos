$(document).ready(function(){


    $('#frmCadastroUsuario').validate({
					rules:{
                                            //cpf:{requred: true, remote: 'Components/Module_comum/CadastroUsuarioComponent.class.php?acaoAjax=validarCpfCadastrado' },
                                                nome:{required: true},
                                                
						email:{required: true},
                                              senha:{required: true},
                                               confsenha:{required: true,equalTo:"#senha"}
                                                
					},
					messages:{
                                            //cpf:{ required: '<font color="red">CPF é obrigatório.</font>' , remote:'<font color="red"><b> CPF inválido ou indiponível.</b></font>'},
                                            nome:{ required: '<font color="red">Nome é obrigatório.</font>'},
                                           
                                            email:{ required: '<font color="red">Email é obrigatório.</font>'},
                                            senha:{ required: '<font color="red">Senha é obrigatória.</font>'},
                                           confsenha:{required: '<font color="red">Confirmação Senha é obrigatório.</font>',equalTo:'<font color="red">Confirmação deve ser idêntico ao campo senha.</font>'}
					}					
				});   
});
