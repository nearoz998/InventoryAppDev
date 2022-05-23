<script type="text/javascript">
    // productunit form validation
    jQuery("#productunitform-" + @json($id)).validate({
        rules: {
            unit: {
                maxlength: 10,
                required: !0
            },
            status: {
                required: !0
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });

    // tax form validation
    jQuery("#taxform-" + @json($id)).validate({
        rules: {
            tax: {
                number: true,
                min: 0.00,
                required: !0
            },
            status: {
                required: !0
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });

    // productcategory form validation
    jQuery("#productcategoryform-" + @json($id)).validate({
        rules: {
            category: {
                maxlength: 100,
                required: !0
            },
            status: {
                required: !0
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });
    // supplier form validation
    jQuery("#supplierform-" + @json($id)).validate({
        rules: {
            name: {
                maxlength: 100,
                required: !0
            },
            mobile: {
                minlength: 10,
                maxlength: 10,
                number: !0
            },
            address: {
                maxlength: 255,
            },
            balance: {
                // maxlength: 14,
                number: true,
            },
            details: {
                maxlength: 10000,
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });
    // customer form validation
    jQuery("#customerform-" + @json($id)).validate({
        rules: {
            name: {
                maxlength: 100,
                required: !0
            },
            mobile: {
                minlength: 10,
                maxlength: 10,
                number: !0
            },
            address: {
                maxlength: 255,
            },
            balance: {
                // maxlength: 14,
                number: true,
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });
    // product form validation
    jQuery("#productform-" + @json($id)).validate({
        rules: {
            name: {
                maxlength: 100,
                required: !0
            },
            weight: {
                number: true,
            },
            size: {
                number: true,
                min: 1,
                required: !0
            },
            unit: {
                required: !0
            },
            category: {
                required: !0
            },
            service_rate: {
                min: 1,
                required: !0
            },
            supplier: {
                required: !0
            },
            price: {
                min: 1.00,
                required: !0
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });
    // purchase form validation
    jQuery("#purchaseform-" + @json($id)).validate({
        rules: {
            supplier: {
                required: !0
            },
            date: {
                date: true,
                required: !0
            },
            invoice_no: {
                number: true,
                min: 1,
                required: !0
            },
            details: {
                maxlength: 1000,
            },
            payment_type: {
                required: !0
            },
            product: {
                required: !0
            },
            quantity: {
                min: 0.00,
                required: !0
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });
    // designation form validation
    jQuery("#designationform-" + @json($id)).validate({
        rules: {
            designation: {
                maxlength: 100,
                required: !0
            },
            details: {
                maxlength: 1000,
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });
    // employee form validation
    jQuery("#employeeform-" + @json($id)).validate({
        rules: {
            name: {
                maxlength: 100,
                required: !0
            },
            designation: {
                maxlength: 100,
                required: !0
            },
            phone: {
                minlength: 10,
                maxlength: 10,
                number: true,
                required: !0
            },
            email: {
                email: true,
            },
            zip_code: {
                number: true,
                min: 1,
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });
</script>
