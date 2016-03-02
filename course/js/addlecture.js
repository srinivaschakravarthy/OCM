function addvideolec(courseid)
{
  clearInputError();
  $('.addlec-submit-btn').hide();
  $('#loading1').show();
  var file_data = $('#videofile').prop('files')[0];
  var videofilename = $('#videofilename').val();
  var video_desc = $('#video_desc').val();
  var form_data = new FormData();
  form_data.append('file', file_data);
  form_data.append('mode', 'video');
  form_data.append('ext',videofilename.split('.').pop());
  form_data.append('courseid', courseid);
  form_data.append('video_desc', video_desc);
  // alert(form_data);
  $.ajax({
      url: g_url + 'course/backend/addlecture.php', // point to server-side PHP script
      dataType: 'json',  // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function(json){
        if(json.status == 1)
        {
          location.replace(g_url + "course/lectures.php?c=" + courseid + "&l=" + json.lecindex);
        }
        else if(json.status == 2){
          $('.addlec-form-message').html("Unsupported extension. Upload only mp4/ogg/webm files");
          $('#loading1').hide();
          $('.addlec-submit-btn').show();
        }
        else {
          $('.addlec-form-message').html("Something went wrong please try again later");
          $('#loading1').hide();
          $('.addlec-submit-btn').show();
        }
      }
   });
}
function addtextlec(courseid)
{
  clearInputError();
  $('#loading2').show();
  $('.addlec-submit-btn').hide();
  var file_data = $('#textfile').prop('files')[0];
  var textfilename = $('#textfilename').val();
  var textlec_desc = $('#textlec_desc').val();
  var form_data = new FormData();
  form_data.append('file', file_data);
  form_data.append('mode', 'text');
  form_data.append('ext',textfilename.split('.').pop());
  form_data.append('courseid', courseid);
  form_data.append('textlec_desc', textlec_desc);
  // alert(form_data);
  $.ajax({
      url: g_url + 'course/backend/addlecture.php', // point to server-side PHP script
      dataType: 'json',  // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function(json){
          if(json.status == 1)
          {
            location.replace(g_url + "course/lectures.php?c=" + courseid + "&l=" + json.lecindex);
          }
          else if(json.status == 2){
            $('.addlec-form-message').html("Unsupported extension. Upload only pdf files");
            $('#loading2').hide();
            $('.addlec-submit-btn').show();
          }
          else {
            $('.addlec-form-message').html("Something went wrong please try again later");
            $('#loading2').hide();
            $('.addlec-submit-btn').show();
          }
        }
   });
}
