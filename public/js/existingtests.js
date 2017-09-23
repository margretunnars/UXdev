$(function() {

  //Get all existing tests
  var currentHref = window.location.href.split('/');
  var originalFormAction =$('.createOrUpdateTest').attr('action');

  if(currentHref.indexOf('tests') !== -1 &&
    currentHref.indexOf('create') !== -1){
    getExistingTests();
  }

  var _existingtests = [];
  function getExistingTests(){
    $.ajax({
      url: '/existingtests',
      type:'GET',
      success:function(data){
        _existingtests = data;
        fillSelection(data);
      },
      error: function(){
        console.log('error');
      }
    });
  }

  function fillSelection(existingTests){
    $.each(existingTests, function(index, value){
      $('#selectExistingTest').append($('<option>', {value:value.id, text:value.name}));
    });
  }

  $("#selectExistingTest").change(function() {
    var id = $(this).val();
    if(id !== ''){
      var test = findTest(id);
      $('.createOrUpdateTest').attr("action", originalFormAction + '/' + id);
      $('<input>').attr({
        type: 'hidden',
        name: '_method',
        value: 'PUT'
      }).appendTo('.createOrUpdateTest');
      $('.inputtestname').val(test.name);
      $('.inputtestdescription').val(test.description);
      $('.inputteststatus').val(test.status);
    }else{
      $('.createOrUpdateTest').attr("action", originalFormAction);
      $('.createOrUpdateTest').remove();
      $('.inputtestname').val('');
      $('.inputtestdescription').val('');
      $('.inputteststatus').val('');
    }

      function findTest(id){
        return _existingtests.filter(function(test) {
          return test.id == id;
        })[0];
      } 
  });
});