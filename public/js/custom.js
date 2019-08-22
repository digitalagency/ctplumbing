  jQuery(document).ready(function($) {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': csrftoken
      }
    });

      $("#newsletter_form").on("click", "#btn_newsletter", function () {
        $('#nl_msg').html('Please wait...');
        var nlSaveUri = window.nlSaveUri;
        var error = '';
        var nl_email  = ($('#nl_email').length) ? $('#nl_email').val() : '';

        if (typeof nl_email  !== "undefined" && nl_email){
          if (!validateEmail(nl_email)) {
            $('#nl_msg').html('Email should be valid.');
            return false;
          }
        } else{
          $('#nl_msg').html('Email is empty.');
          return false;
        }


        $.ajax({
          data : {
            nl_email : nl_email
          },

          url : nlSaveUri,
          type : 'POST',
          success : function(response) {
            $('#newsletter_form')[0].reset();
            $('#nl_msg').html('Your email has been successfully subscribed.');
            return false;
          }

        });

      });

    function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

  });
