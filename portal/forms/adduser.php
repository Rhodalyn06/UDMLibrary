<div class = "form-group">
	<label style="font-family:'MYRIAD PRO REGULAR';">User Type</label>
	<select class = "form-control" style="height:50px; width: 50%;" id = "type" name = "type" onchange="viewDetails(this.value)">
		<option value = "0" hidden> Choose One </option>
		<option value = "3"> Librarian </option>
		<option value = "1"> Student </option>
		<option value = "2"> Faculty </option>
    <option value = "4"> Alumni </option>
    
	</select>
</div>

<div id = "a">
</div>



  <div class="row">
  <div class="col-md-3">
      <button  class="btn btn-default btn-block" style="width:45%;font-size:20px;" onclick = "save()">Add User</button>
  </div>
    

    <div class="col-md-3">
        <button class="btn btn-default btn-block" type="button" style="width:40%;font-size:20px;" onclick="ClearFields();">Cancel</button>

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
        var postion = $('#postion').val();
       

        validateInput('fname', fname, 'fnamex');
        validateInput('lname', lname, 'lnamex');
        validateInput('postion', postion, 'postionx');

        if (fname == "" || lname == "" || postion == ""){
          //modal
          $('#allfields').modal('show');
        }
        else{
          $.ajax({

            url: "ajax/insert/adduser.php",
            type: 'POST',
            data: {type: type, fname: fname, lname: lname,middilename: middilename, postion: postion},
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


      else if(type!=3){
        var fname = $('#fname').val();
        var lname = $('#lname').val();

       

        validateInput('fname', fname, 'fnamex');
        validateInput('lname', lname, 'lnamex');

        if (fname == "" || lname == "" ){
          //modal
          $('#allfields').modal('show');
        }
        var fname = $('#fname').val();
        var lname = $('#lname').val();

      
     
        var address = $('#add').val();
        var middilename  = $('#middilename').val();
        var collg = $('#collg').val();
        var course = $('#course').val();

       
        validateInput('add', address, 'addx');
        validateInput('fname', fname, 'fnamex');
        validateInput('lname', lname, 'lnamex');
      
        validateInput('collg', collg, 'collgx');
        validateInput('course', course, 'coursex');
        if (fname == "" || lname == "" || address == "" ||  collg == "" || course == ""){
          //modal
        }
        else{
            $.ajax({

            url: "ajax/insert/adduser.php",
            type: 'POST',
            data: {type: type, fname: fname, lname: lname, address: address, middilename:middilename, collg:collg, course:course},
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
      else if(type==4){
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var middilename  = $('#middilename').val();

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
            data: {type: type, fname: fname, lname: lname,  middilename:middilename},
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
    str1 = str1 || '';
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

     document.getElementById("lname").value = "";
     document.getElementById("fname").value = "";
     document.getElementById("middilename").value = "";
     document.getElementById("add").value = "";
     document.getElementById("collg").value = "";
     document.getElementById("course").value = "";

}

</script>

