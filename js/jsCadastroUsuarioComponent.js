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
                                            nome:{ required: ''},
                                           
                                            email:{ required: ''},
                                            senha:{ required: ''},
                                           confsenha:{required: '',equalTo:''}
					}					
				});   
});