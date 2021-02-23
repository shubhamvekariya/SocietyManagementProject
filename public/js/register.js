$(document).ready(function(){
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    $("#form").steps({
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        autoFocus: true,
        labels: 
        {
            finish: "Register",
        },
        onStepChanging: function (event, currentIndex, newIndex)
        {
            // Always allow going backward even if the current step contains invalid fields!
            if (currentIndex > newIndex)
            {
                return true;
            }

            // Forbid suppressing "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age").val()) < 18)
            {
                return false;
            }

            var form = $(this);

            // Clean up if user went backward before
            if (currentIndex < newIndex)
            {
                // To remove error styles
                $(".body:eq(" + newIndex + ") label.error", form).remove();
                $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
            }

            // Disable validation on fields that are disabled or hidden.
            form.validate().settings.ignore = ":disabled,:hidden";

            // Start validation; Prevent going forward if false
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex)
        {
            // Suppress (skip) "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age").val()) >= 18)
            {
                $(this).steps("next");
            }

            // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3)
            {
                $(this).steps("previous");
            }
        },
        onFinishing: function (event, currentIndex)
        {
            var form = $(this);

            // Disable validation on fields that are disabled.
            // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
            form.validate().settings.ignore = ":disabled";

            // Start validation; Prevent form submission if false
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            var form = $(this);

            // Submit form input
            form.submit();
        }
    }).validate({
        errorPlacement: function (error, element)
        {
            element.before(error);
        },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    $("#country").select2({
        placeholder: "Select a country",
        allowClear: true
    });
    $("#state").select2({
        placeholder: "Select a state",
        allowClear: true
    });
    $("#city").select2({
        placeholder: "Select a city",
        allowClear: true
    });
});
const url = '/country';
window.onload = async function() {
    const response = await fetch(url);
    window.data = await response.json();
    conData = data;
    //Initialize Country
    for (var i = 0; i < conData.length; i++) {
        var newOption = new Option(conData[i]['name'],conData[i]['name']+"("+i+")", false, false);
        $('#country').append(newOption);
    }
    $('#country').trigger('change');
    //Country change function
    $('#country').on("change", function (e) { 
        var cname = $('#country').find(':selected').val();
        cname = cname.substring(cname.indexOf('(') + 1);
        var cvalue = parseInt(cname.substring(0,cname.indexOf(')')));
        $('#state').empty();
        $('#state').append(new Option('','', false, false));
        if(!isNaN(cvalue))
        {
            for(var state in conData[cvalue]['states']) {
                var statename = conData[cvalue]['states'][state]['name'];
                var newOption = new Option(statename ,statename+"("+state+")", false, false);
                $('#state').append(newOption);
            }
        }
        $('#state').trigger('change');
        });
    
    //State change function
    $('#state').on("change", function (e) { 
        var cname = $('#country').find(':selected').val();
        cname = cname.substring(cname.indexOf('(') + 1);
        var cvalue = parseInt(cname.substring(0,cname.indexOf(')')));
        var sname = $('#state').find(':selected').val();
        sname = sname.substring(sname.indexOf('(') + 1);
        var svalue = parseInt(sname.substring(0,sname.indexOf(')'))); 
        $('#city').empty();
        $('#city').append(new Option('','', false, false));
        if(!isNaN(svalue))
        {	
            for(var city in conData[cvalue]['states'][svalue]["cities"]) {
                var cityname = conData[cvalue]['states'][svalue]["cities"][city]['name'];
                var newOption = new Option( cityname,cityname+"("+city+")", false, false);
                $('#city').append(newOption);
            }
            
        }
        $('#city').trigger('change');
    });

}