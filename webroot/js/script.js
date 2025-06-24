$(document).ready(function () {

        //REGRAS CUSTOMIZADAS
    $.validator.addMethod("validarCPF", function (value, element) {
        return this.optional(element) || /^\d{3}\.\d{3}\.\d{3}-\d{2}|$/i.test(value);
    }, "Informe seu CPF");

    //MASCARAS
    $('#cpf').inputmask({
        mask: ['999.999.999-99'], keepStatic: true
    });
    $('.cpf').inputmask({
        mask: ['999.999.999-99'], keepStatic: true
    });
    $('.telefone').inputmask({
        mask: ["(99) 9999-9999", "(99) 99999-9999"],
        keepStatic: true,
        greedy: false,
        onBeforeMask: function (value, opts) {
            return value.replace(/\D/g, ''); // Remove caracteres não numéricos antes de aplicar a máscara
        }
    });


    $('.cep').inputmask({
        mask: ['99999-999'], keepStatic: true
    });
    $('.hora').inputmask({
        mask: ['99:99'], keepStatic: true
    });


    //Validações
    $(".formulario-cadastro").validate({
        errorClass: "is-invalid", // Adicione a classe 'is-invalid' aos inputs com erros
        validClass: "is-valid", errorPlacement: function (error, element) {
            // Customização da exibição de erros, se necessário
            error.insertAfter(element); // Coloca a mensagem de erro após o input
        }, rules: {
            nome: {
                minWords: 2
            }, cpf: {
                required: true,
            },
        }, messages: {
            nome: {
                minWords: "Digite o nome e o sobrenome ", required: "Este campo é obrigatório "
            }, cpf: {
                required: "Este campo é obrigatório"
            },
        }

    });

});



