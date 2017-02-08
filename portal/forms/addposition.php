<div class = "form-group">
	<label style="font-family:'Abel';">Category Type</label>
	<select class = "form-control" style="height:50px; width: 50%;" id = "type" name = "type" onchange="viewDetails(this.value)">
		<option value = "0" hidden> Please Choose One </option>
    <option value = "4"> Position </option>
    <option value = "5"> Colleges </option>
    <option value = "6"> Departments </option>


	</select>
</div>

<div id = "bkc">
</div>

<div class="row">
  <div class="col-md-4">
<div class = "form-group">
  <button  class="btn btn-default btn-block" onclick = "save()">Submit</button>
</div>
</div>
</div>



<script>
  function viewDetails(str){

    $.ajax({
      url: "ajax/view/addposition.php",
      type: 'POST',
      data: {type1: str},
      success: function(data){
        $("#bkc").html(data);
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
      if (type==4){
        var postion = $('#postion').val();

        validateInput('postion', postion, 'postionx');

        
        if (postion == ""){
          //modal
          $('#allfields').modal('show');
        }
        else{
          $.ajax({

            url: "ajax/insert/addposition.php",
            type: 'POST',
            data: {type: type, postion: postion},
            success: function(data){
              //$("#a").html(data);
              if (data=="done"){
                
                $('#success').modal('show');
                
                
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





else if (type ==5){

        var collges = $('#collges').val();

        validateInput('collges', collges, 'collgesx');

        if (collges == ""){
          //modal
          $('#allfields').modal('show');
        }
        else{
            $.ajax({

            url: "ajax/insert/addcolleges.php",
            type: 'POST',
            data: {type: type, collges: collges},
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

      else if (type ==6){

        var departs = $('#departs').val();

        validateInput('departs', departs, 'departsx');

        if (departs == ""){
          //modal
          $('#allfields').modal('show');
        }
        else{
            $.ajax({

            url: "ajax/insert/adddeparts.php",
            type: 'POST',
            data: {type: type, departs: departs},
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

