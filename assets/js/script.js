"use strict"

const base_url = $("input[name=base_url]").val();
let csrf_value = $("input[name=csrf_value]").val();

$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);

if($("#register-form").length > 0)
{
    $("#register-form").validate({
        rules: {
            exams: "required",
            board: "required",
            exam_date: "required",
            exam_lang: "required",
            country: "required",
            state: "required",
            city: "required",
            password: "required",
            terms: "required",
            name: {
                required: true,
                maxlength: 50
            },
            email: {
                required: true,
                email: true,
                maxlength: 100
            },
            address: {
                required: true,
                maxlength: 255
            },
            mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                number: true
            }
        },
        errorPlacement: (error, element) => {},
        submitHandler: (form) => {
            var data = new FormData(form);
            $.ajax({
                url: $(form).attr('action'),
                type: "POST",
                data: data,
                dataType: 'JSON',
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                error: function() {
                    $("#resigter-errors").html("<div class='text-danger'>Something not going good. Try again.</div>");
                },
                success: function(result) {
                    if (result.status === true) {
                        var options = {
                            "key": $("input[name=razor_key]").val(),
                            "order_id": result.order_id,
                            "amount": (result.amount * 100),
                            "prefill": {
                                "name": `${data.get("name")}`,
                                "contact": data.get("mobile"),
                                "email": data.get("email"),
                            },
                            "handler": function(response) {
                                data.set("payment_id", response.razorpay_payment_id);
                                data.set("order_id", response.razorpay_order_id);
                                data.set("signature", response.razorpay_signature);
                                data.set("payment-method", "Razorpay");
                                
                                $.ajax({
                                    url: $(form).attr('action'),
                                    type: "POST",
                                    data: data,
                                    dataType: 'JSON',
                                    async: false,
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    error: function() {
                                        $("#resigter-errors").html("<div class='text-danger'>Something not going good. Try again.</div>");
                                    },
                                    success: function(res) {
                                        if (res.redirect) {
                                            window.location.href = res.redirect;
                                            return;
                                        }else
                                            $("#resigter-errors").html(`<div class='text-danger'>${result.message}</div>`);
                                    }
                                });
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();                       
                        return;
                    } else
                        $("#resigter-errors").html(`<div class='text-danger'>${result.message}</div>`);
                }
            });
        }
    });
}

if($("suppoters-form").length > 0)
{
    $("#suppoters-form").validate({
        rules: {
            name: "required",
            amount: "required",
            check: "required",
            number: "required",
            email: "required",
            pincode: "required",
            name: {
                required: true,
                maxlength: 50
            },
            amount: {
                required: true,
                maxlength: 50
            },
            check: {
                required: true,
                maxlength: 50
            },
            email: {
                required: true,
                email: true,
                maxlength: 100
            },
            pincode: {
                required: true,
                maxlength: 6
            },
            number: {
                required: true,
                minlength: 10,
                maxlength: 10,
                number: true
            }
        },
        errorPlacement: (error, element) => {},
        submitHandler: (form) => {
            var data = new FormData(form);
            $.ajax({
                url: $(form).attr('action'),
                type: "POST",
                data: data,
                dataType: 'JSON',
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                error: function() {
                    $("#suppoters-form").html("<div class='text-danger'>Something not going good. Try again.</div>");
                },
                success: function(result) {
                    if (result.status === true) {
                        var options = {
                            "key": $("input[name=razor_key]").val(),
                            "order_id": result.order_id,
                            "amount": (result.amount * 100),
                            "prefill": {
                                "name": `${data.get("name")}`,
                                "contact": data.get("mobile"),
                                "email": data.get("email"),
                            },
                            "handler": function(response) {
                                data.set("payment_id", response.razorpay_payment_id);
                                data.set("order_id", response.razorpay_order_id);
                                data.set("signature", response.razorpay_signature);
                                data.set("payment-method", "Razorpay");
                                
                                $.ajax({
                                    url: $(form).attr('action'),
                                    type: "POST",
                                    data: data,
                                    dataType: 'JSON',
                                    async: false,
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    error: function() {
                                        $("#resigter-errors").html("<div class='text-danger'>Something not going good. Try again.</div>");
                                    },
                                    success: function(res) {
                                        if (res.redirect) {
                                            window.location.href = res.redirect;
                                            return;
                                        }else
                                            $("#resigter-errors").html(`<div class='text-danger'>${result.message}</div>`);
                                    }
                                });
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();                       
                        return;
                    } else
                        $("#resigter-errors").html(`<div class='text-danger'>${result.message}</div>`);
                }
            });
        }
    });
}

const getStates = (select) => {    
    let country_id = select.value;
    let dependent = $(select).data('dependent');
    $.ajax({
        url: `${base_url}home/getStates`,
        type: "GET",
        data: { country_id, country_id },
        dataType: 'json',
        async: false,
        error: function() {
            $("#resigter-errors").html("<div class='text-danger'>Something not going good. Try again.</div>");
        },
        success: function(res) {
            let states = '<option disabled selected> Select state</option>';
            if (res.message.length > 0) {
                $(res.message).each(function(k, v) {
                    states += `<option value="${v.id}">${v.name}</option>`;
                });
                $("#" + dependent).attr('readonly', false);
            } else {
                getCities(document.getElementById(dependent));
                $("#" + dependent).attr('readonly', true);
            }
            $("#" + dependent).html(states);            
        }
    });
};

const getCities = (select) => {
    let state_id = select.value;
    let dependent = $(select).data('dependent');
    $.ajax({
        url: `${base_url}home/getCities`,
        type: "GET",
        data: { state_id, state_id },
        dataType: 'json',
        async: false,
        error: function() {
            $("#resigter-errors").html("<div class='text-danger'>Something not going good. Try again.</div>");
        },
        success: function(res) {
            let cities = '<option disabled selected> Select city</option>';
            if (res.message.length > 0) {
                $(res.message).each(function(k, v) {
                    cities += `<option value="${v.id}">${v.name}</option>`;
                });
                $("#" + dependent).attr('readonly', false);
            } else {
                $("#" + dependent).attr('readonly', true);
            }
            $("#" + dependent).html(cities);
        }
    });
};

const getPapers = (select) => {
    let cat_id = select.value;

    let price = $(select).find(":selected").data("price");
    
    if (price)
        $('#new_price').html(price);
    else
        $('#new_price').html('0');

    $.ajax({
        url: `${base_url}home/getPapers`,
        type: "GET",
        data: { cat_id: cat_id },
        dataType: 'json',
        async: false,
        error: function() {
            $("#resigter-errors").html("<div class='text-danger'>Something not going good. Try again.</div>");
        },
        success: function(res) {
            let exams = '<option disabled selected>Select Exam Paper Date</option>';
            if (res.message.length > 0) {
                $(res.message).each(function(k, v) {
                    exams += `<option value="${v.e_id}">${v.e_date}</option>`;
                });
                $("#exm_date").attr('readonly', false);
            } else
                $("#exm_date").attr('readonly', true);
            $("#exm_date").html(exams);
            $("#exam_lang").html('<option disabled selected>Select Exam Language</option>');
            $("#exam_lang").attr('readonly', true);
        }
    });
};

const getLang = (select) => {
    let e_id = select.value;
    let dependent = $(select).data('dependent');
    $.ajax({
        url: `${base_url}home/getLang`,
        type: "GET",
        data: { e_id, e_id },
        dataType: 'json',
        async: false,
        error: function() {
            $("#resigter-errors").html("<div class='text-danger'>Something not going good. Try again.</div>");
        },
        success: function(res) {
            let langs = '<option disabled selected>Select Exam Language</option>';
            if (res.message.length > 0) {
                $(res.message).each(function(k, v) {
                    langs += `<option value="${v.lang_id}">${v.language}</option>`;
                });
                $("#" + dependent).attr('readonly', false);
            } else
                $("#" + dependent).attr('readonly', true);
            $("#" + dependent).html(langs);
        }
    });
};

$("#terms").click(function () {
    if (!$(this).prop("checked")) $("#show-terms-error").fadeIn();
    else $("#show-terms-error").fadeOut();
});