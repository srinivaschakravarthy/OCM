var g_url='http://localhost/dbms3/';
//var g_url='http://arya.16mb.com/witlore/';
//var g_url='http://www.witlore.com/alpha/';
/* checking for availability of email id */
function validateEmail()
{
    clearInputError();
    var fname= $('#sfname').val();
    var lname= $('#slname').val();
    var email= $('#semail').val();
    var usertype = $('#susertype').val();
    var password = $('#spassword').val();
    var password1 = $('#srepassword').val();
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    if(usertype == "")
    {
      $('#susertype').addClass('invalid');
      $('.susertype_label').attr('data-error','Choose a type of account');
    }
    if(password == "")
    {
      $('#srepassword').addClass('invalid');
      $('.srepassword_label').attr('data-error','Password cannot be left empty');
    }
    else if(password1 != password)
    {
      $('#srepassword').addClass('invalid');
      $('.srepassword_label').attr('data-error','Passwords do not match');
    }
    else if(pattern.test(email))
    {
      //console.log("Hi");
      $.ajax(
      {
        url: g_url+"accounts/signup.php",
        dataType: "json",
        type:"POST",
        data:
        {
          mode:'valid_email',
          email:email,
        },
        success: function(json)
        {
          if(json.status==1)
          {
            if(json.msg == "duplicate_email")
            {
              $('#semail').addClass('invalid');
              $('.email_label').attr('data-error','Email registered');
            }
          }
          else
          {
            console.log('Hi');
            createUser();
          }
        },
        error : function()
        {
          //console.log("something went wrong in email checking!");
        }
      });
    }
    else
    {
      $('#semail').addClass('invalid');
      $('.semail_label').attr('data-error','Invalid email');
    }
}

$("#signup-form").submit(function(e) {
    e.preventDefault();
});
$("#signup-form-company").submit(function(e) {
    e.preventDefault();
});
$("#login-form").submit(function(e) {
    e.preventDefault();
});
function clearInputError()
{
  $('.validate').removeClass("invalid");
}
/* creating a new user */
function createUser(){
    $('.signup-btn').hide();
    var fname= $('#sfname').val();
    var lname= $('#slname').val();
    var email= $('#semail').val();
    var usertype = $('#susertype').val();
    var password = $('#spassword').val();
    var password1 = $('#srepassword').val();
    //console.log(fname);
    $.ajax(
    {
      url: g_url+"accounts/signup.php",
      type:"POST",
      data:
      {
        mode:'signup',
        fname:fname,
        lname:lname,
        email:email,
        usertype:usertype,
        password:password,
      },
      success: function()
      {
          location.reload();
      },
      error: function()
      {
        $('.signup-form-message').html("Some unknown error occurred. Please try again");
      }
    });
}
/*Login*/
function verifyLogin()
{
  var email = $('#lemail').val();
  var password = $('#lpassword').val();
  $.ajax(
    {
      url: g_url+"accounts/login.php",
      dataType:"json",
      type:"POST",
      data:
      {
        email:email,
        password:password,
      },
      success: function(json)
      {
        if(json.status == 1)
        {
			location.reload();
        }
        else
        {
          $('.login-form-message').html('Invalid email or password. Please try again!');
        }
      },
      error: function()
      {
        $('.login-form-message').html("Some unknown error occurred. Try again.");
      }
    });
}
