<div class = "form-group">
	<label style="font-family:'MYRIAD PRO REGULAR';">Type's of Category</label>
	<select class = "form-control" style="height:50px; width: 100%;" id = "type" name = "type" onchange="viewDetails(this.value)">
  
		<option value = "0" hidden> Please Choose One </option>
		<option value = "3"> Acquisition Method</option>
		<option value = "1"> Book Category </option>

	</select>
</div>

<div id = "ctg">
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
      url: "ajax/view/addcateg.php",
      type: 'POST',
      data: {type1: str},
      success: function(data){
        $("#ctg").html(data);
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
        var ctgname = $('#ctgname').val();

        validateInput('ctgname', ctgname, 'ctgnamex');

        
        if (ctgname == ""){
          //modal
          $('#allfields').modal('show');
        }
        else{
          $.ajax({

            url: "ajax/insert/addcateg.php",
            type: 'POST',
            data: {type: type, ctgname: ctgname},
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

      else if (type ==1){

        var bkcateg = $('#bkcateg').val();

        validateInput('bkcateg', bkcateg, 'bkcategx');

        if (bkcateg == ""){
          //modal
          $('#allfields').modal('show');
        }
        else{
            $.ajax({

            url: "ajax/insert/addcategg.php",
            type: 'POST',
            data: {type: type, bkcateg: bkcateg},
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

