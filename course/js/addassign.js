function addassign(courseid)
{
  clearInputError();
  $('.addassign-submit-btn').hide();
  $('#loading1').show();
  var file_data = $('#assignfile').prop('files')[0];
  var assignfilename = $('#assignfilename').val();
  var prob_stmnt = $('#prob_stmnt').val();
  var assign_marks = $('#assign_marks').val();
  var assign_deadline = $('#assign_deadline').val();
  var form_data = new FormData();
  form_data.append('file', file_data);
  form_data.append('mode', 'assign');
  form_data.append('ext',assignfilename.split('.').pop());
  form_data.append('courseid', courseid);
  form_data.append('prob_stmnt', prob_stmnt);
  form_data.append('assign_marks', assign_marks);
  form_data.append('assign_deadline', assign_deadline);
  // alert(form_data);
  $.ajax({
      url: g_url + 'course/backend/addassign.php', // point to server-side PHP script
      dataType: 'json',  // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function(json){
        if(json.status == 1)
        {
          location.replace(g_url + "course/assignments.php?c=" + courseid + "&l=" + json.assignindex);
        }
        else if(json.status == 2){
          $('.addassign-form-message').html("Unsupported extension. Upload only pdf files");
          $('#loading1').hide();
          $('.addassign-submit-btn').show();
        }
        else {
          $('.addassign-form-message').html("Something went wrong please try again later");
          $('#loading1').hide();
          $('.addassign-submit-btn').show();
        }
      }
   });
}
