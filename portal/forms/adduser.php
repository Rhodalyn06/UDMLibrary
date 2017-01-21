<div class = "form-group">
	<label style="font-family:'MYRIAD PRO REGULAR';">User Type</label>
	<select class = "form-control" style="height:50px; width: 100%;" id = "type" name = "type" onchange="viewDetails(this.value)">
		<option value = "0" hidden> Choose One </option>
		<option value = "3"> Librarian </option>
		<option value = "1"> Student </option>
		<option value = "2"> Faculty </option>
	</select>
</div>

<div id = "a">
</div>

<div class="row">
  <div class="col-md-3">
<div class = "form-group">
  <button  class="btn btn-default btn-block" onclick = "save()">Add User</button>
</div>
</div>
</div>

<script>
  function viewDetails(str){

    $.ajax({
      url: "ajax/view/adduser.php",
      type: 'POST',
      data: {type1: str},
      success: function(data){
        $("#a").html(data);
        if (str == 0){
          document.getElementById('type').selectedIndex=0;

        }
      }
    });

  }

 function save(){
    var type = $('#type').val();
    if (type == 0){
      $('#typex').addClass('has-error');
      $('#typex').removeClass('has-success');
    }
    else{
      $('#typex').addClass('has-success');
      $('#typex').removeClass('has-error');
      if (type==3){
        var fname = $('#fname').val();
        var lname = $('#lname').val();

        validateInput('fname', fname, 'fnamex');
        validateInput('lname', lname, 'lnamex');
        
        if (fname == "" || lname == ""){
          //modal
          $('#allfields').modal('show');
        }
        else{
          $.ajax({

            url: "ajax/insert/adduser.php",
            type: 'POST',
            data: {type: type, fname: fname, lname: lname, middilename: middilename},
            success: function(data){
              //$("#a").html(data);
              if (data=="done"){
                
                $('#success').modal('show');
                //$('#auser').modal('hide');
                
                document.getElementById('type').selectedIndex=0;
                viewDetails('0');
              }
              else{
                alert(data);
              }
            }
          });
        }
      }
      else{
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var contactnum = document.getElementsByName('contactnum')[0].value;
        var bday = $('#bday').val();
        var address = $('#add').val();
        var middilename  = $('#middilename').val();

        validateInput('bday', bday, 'bdayx');
        validateInput('add', address, 'addx')
        contactNum('contactnum');
        validateInput('fname', fname, 'fnamex');
        validateInput('lname', lname, 'lnamex');
        validateInput('middilename  ', middilename  , 'middilename  ');
        if (fname == "" || lname == "" || bday == "" || address == "" || contactnum == "" || middilename   == ""){
          //modal
        }
        else{
            $.ajax({

            url: "ajax/insert/adduser.php",
            type: 'POST',
            data: {type: type, fname: fname, lname: lname, address: address, contactnum: contactnum, bday: bday, middilename:middilename},
            success: function(data){
              //$("#a").html(data);
              if (data=="done"){
                $('#success').modal('show');
                //$('#auser').modal('hide');
                document.getElementById('type').selectedIndex=0;
                viewDetails('0');
              }
              else{
                alert(data);
              }
            }
          });
        }
      }
    }
  }



  function closes(){
    
    $('#addalert').modal('hide');
    $('#auser').modal('hide');
  }


  function validateSelect(str, str1, str2){
    //alert('try');
    str1 = str.trim();
    if (str1 == 0){
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

</script>

