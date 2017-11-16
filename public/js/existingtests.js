$(function() {

  //Get current URL as an array split by '/'
  var currentHref = window.location.href.split('/');

  //Get original form action URL
  var originalFormAction = $('.createOrUpdateTest').attr('action');

  //Get all existing tests if the URL contains tests and create - https://www.w3schools.com/jsref/jsref_indexof.asp
  if(currentHref.indexOf('tests') !== -1 &&
    currentHref.indexOf('create') !== -1){
    getExistingTests();
  }

  //Fill dropdown menu with existing tests
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

  //If an existing test is selected - change POST to PUT - 
  //https://stackoverflow.com/questions/9198028/changing-form-method-with-js-on-firefox
  //http://api.jquery.com/change/
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
      //Filter function to find a specific test in the _existingtests array
      function findTest(id){
        return _existingtests.filter(function(test) {
          return test.id == id;
        })[0];
      } 
  });
});