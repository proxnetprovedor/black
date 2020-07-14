$('.datetimepicker').datetimepicker({
    format: 'DD/MM/YYYY',
    locale: moment.locale('pt-br'),
    icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
    }
});


$(".formValidation").validate({
    debug: true,
    rules: {
        cpf_cnpj: {
            required: true
        },
        cep: {
            required: true
        },
        name: {
            required: true,
        },
        phone: {
            required: true,
        },
        address: {
            required: true,
        },
        number: {
            required: true,
        },
        neighborthood: {
            required: true,
        },
        city: {
            required: true,
        },
        state: {
            required: true,
        },
    },
    submitHandler: (form) => form.submit()
});
// mask phone
var behavior = function(val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    options = {
        onKeyPress: function(val, e, field, options) {
            field.mask(behavior.apply({}, arguments), options);
        }
    };

$('.phone-mask').mask(behavior, options);

// mask cpf|cnpj
var cpfOrCnpj = function(val) {
        return val.replace(/\D/g, '').length > 11 ? '00.000.000/0000-00' : '000.000.000-009';
    },
    cpfOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(cpfOrCnpj.apply({}, arguments), options);
        }
    };
$('.cpf_cnpj-mask').mask(cpfOrCnpj, cpfOptions);