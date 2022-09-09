jQuery(document).ready(function() {
    $('#btn3').click(function()
    {
        $('#msge').hide();
    });
    });

    jQuery(document).ready(function() {
        jQuery("#logform").validate({
            rules: {
                userName:{
                    required:true,
                    maxlength:10,
                },
                userPass:{
                    required:true, 
                }
            },
                messages:{
                    userName:{
                        required: "* Please provide a user name *",
                        maxlength:"**please enter user name max length 10 **",
                    },
                    userPass:{
                        required: "** Password is mandatory **",  
                    }
                }
        });
        });