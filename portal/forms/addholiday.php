<?php
  include_once('ajax/validate.html');
?>


   

<div class="row form-group">
  <div class="col-md-6">
    <div class = "form group" id = "fhname">
      <label style="font-size:18px;">Holiday Name</label>
      <input class="form-control" name="hname" id = "hname" 
      oninput="validateAlphaNumer(this.name)"
      onblur="validateInput('hname', this.value, 'fhname')">
    </div>
  </div>
</div>
<div class="row form-group">
  <div class="col-md-6">
    <div class = "form group" id = "fhdate">
      <label style="font-size:18px;">Holiday Date</label>
      <input class="form-control" name="hdate" id = "hdate" type="date"
      onblur="validateInput('hdate', this.value, 'fhdate')">
    </div>
  </div>
</div>


 <div class="row">
  <div class="col-md-3">
    <button type="button" style="width:40%;font-size:20px;" class = "btn btn-default btn-block" onclick="addHoliday()">Add Date</button>
  </div>
    

    <div class="col-md-3">
        <button class="btn btn-default btn-block"  type="button" style="width:40%;font-size:20px;" onclick="ClearFields();">Cancel</button>

    </div>
</div>

<script>

function addHoliday(){
  var name = $('#hname').val().trim();
  var day = $('#hdate').val().trim();

  if (name == "" || day == ""){
    validateInput('hname', name, 'fhname');
    validateInput('hdate', day, 'fhdate');
    $('#allfields').modal('show');
    $('#hname').val("");
    $('#hdate').val("");
  }
  else{
    $.ajax({
      url: "ajax/insert/addholiday.php",
      type: "POST",
      data: {type: name, type1: day},
      success: function(data){
        $('#hname').val("");
        $('#hdate').val("");
        $('#success').modal("show");
      }

    });
  }
}

function validateInput(str, str1, str2){
    //alert('try');
    str1 = str1.trim();
    if (str1 == ""){
      $('#'+str).val(str1);
      $('#'+str2).addClass('has-error');
      $('#'+str2).removeClass('has-success');
    }
    else{
      $('#'+str).val(str1);
      $('#'+str2).addClass('has-success');
      $('#'+str2).removeClass('has-error');

    }
  }

function ClearFields() {

     document.getElementById("hname").value = "";
     document.getElementById("hdate").value = "";
     
}


</script>