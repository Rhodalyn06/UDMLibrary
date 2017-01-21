<?php
  include_once('ajax/validate.html');
?>
<div class="row form-group">
  <div class="col-md-10"> 
    <div class = "form group" id = "ftitle">
      <label>Title of Book</label>
      <input class="form-control" name="title" id = "title" oninput="validateTitle(this.name)"
      onblur="validateInput('title', this.value, 'ftitle')">
    </div>
  </div>
</div>
<div class="row form-group">
      
  <div class="col-md-3">
    <div class = "form group" id = "flastname">
    <label>Author's Last Name</label>
    <input class="form-control" name="lastname" id = "lastname" oninput="validateLetters(this.name)"
    onblur="validateInput('lastname', this.value, 'flastname')">
    </div>
  </div>
  <div class="col-md-3">
    <div class = "form group" id = "ffirstname">
    <label>Author's First Name</label>
    <input class="form-control" name="firstname" id = "firstname" oninput="validateLetters(this.name)"
    onblur="validateInput('firstname', this.value, 'ffirstname')">
    </div>
  </div>
<div class="row">
  <div class="col-md-4" style="margin-top: 30px;">

    <div class = "form group">
    <label style="visibility: hidden;">afhal</label>
    <button class = "btn btn-info btn-block" onclick="viewAuthor()">Add Sub-authors</button>
    </div>
  </div>
</div>
</div>
<div class="row form-group">
  <div class="col-md-3">
    <div class = "form group" id = "fcopyright">
      <label>Copyright</label>
      <input class="form-control" name="copyright" id = "copyright" 
      onblur="validateInput('copyright', this.value, 'fcopyright')"
      oninput="validateNum(this.name)" maxlength = 4>
    </div>
  </div>
  <div class="col-md-4">
    <div class = "form group" id = "fcallno">
      <label>Call Number</label>
      <input class="form-control" name="callno" id = "callno" oninput="validateAlphaNumer(this.name)"
      onblur="validateInput('callno', this.value, 'fcallno')">
    </div>
  </div>


    <div class="col-md-4">
    <div class = "form group" id = "faccno">
      <label>Accession Number</label>
      <input class="form-control" name="accno" id = "accno" oninput="validateAlphaNumer(this.name)"
      onblur="validateInput('accno', this.value, 'faccno')">
    </div>
  </div>
</div>

<div class = "row form group">
  <div class="col-md-4" id = "fmethod">
    <label>Acquisition Method</label>
    <select class="form-control" style="height:50px;" name="acquisitionmethod" id = "acquisitionmethod"
    onblur="validateSelect('acquisitionmethod', this.value, 'fmethod')">
    <option value = "0" hidden>Choose One</option>
      <?php

  include_once('../connection.php');
  
  $sql = $conn->query("SELECT * FROM tb_category");
  while(($row=$sql->fetch_assoc())==true){

    ?>
    <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
    <?php } 
    ?>

    </select>
  </div>

  <div class="col-md-4">
    <div class = "form group" id = "fcopy">
      <label>Number of Copies</label>
      <input class="form-control" name="copies" id = "copies" 
      onblur="validateInput('copies', this.value, 'fcopy')"
      oninput="validateNum(this.name)" maxlength = "4">
    </div>
  </div>
</div>

<div class="row form-group">
  <div class="col-md-4">
    
      <div class = "form group" id = "fedition">
        <label>Edition</label>
        <input class="form-control" name="edition" id = "edition" 
        onblur="validateInput('edition', this.value, 'fedition')"
        oninput="validateAlphaNumer(this.name)" maxlength = "10">
      </div>
    
  </div>

  <div class="col-md-3">
    <div class = "form group" id = "fprice">
      <label>Price</label>
      <input class="form-control" name="price" id = "price"
      onblur="validateInput('price', this.value, 'fprice')"
      oninput="validateNumbers(this.name)" onblur="zero(this.name)">
    </div>
  </div>
</div>
<div class = "row form group">
  <div class="col-md-6">
    <div class = "form group" id = "fdesc">
      <label>Physical Description</label>
      <input class="form-control" name="description" id = "description"
      onblur="validateInput('description', this.value, 'fdesc')"
      oninput="validateAlphaNumer(this.name)">
    </div>
  </div>
  <div class="col-md-5">
    <div class = "form group" id = "fisbn">
      <label>Standard Number</label>
      <input class="form-control" name="isbn" id = "isbn" 
      onblur="validateInput('isbn', this.value, 'fisbn')"
      oninput="validateAlphaNumer(this.name)" maxlength = "12">
    </div>
  </div>
</div>
<div class="row form-group">
  <div class="col-md-6">
    
      <div class = "form group" id = "fpublisher">
        <label>Publisher</label>
        <input class="form-control" name="publisher" id = "publisher" 
        onblur="validateInput('publisher', this.value, 'fpublisher')"
        oninput="validateAlphaNumer(this.name)" maxlength = "10">
      </div>
    
  </div>

  <div class="col-md-6">
  
      <div class = "form group" id = "fcategory">
        <label>Category</label>
        <select class ="form-control" style="height:50px;" id = "category" 
        onblur="validateSelect('category', this.value, 'fcategory')">

         <?php

  include_once('../connection.php');
  
  $sql = $conn->query("SELECT * FROM tb_categoryy");
  while(($row=$sql->fetch_assoc())==true){

    ?>
    <option value="<?php echo $row['bkcategory']; ?>"><?php echo $row['bkcategory']; ?></option>
    <?php } 
    ?>
            
        </select>
      </div>
    
  </div>

    <div class="col-md-6">
    
      <div class = "form group" id = "fseries">
        <label>Series</label>
        <input class="form-control" name="series" id = "series" 
        onblur="validateInput('series', this.value, 'fseries')"
        oninput="validateAlphaNumer(this.name)">
      </div>
    
  </div>

 <div class="col-md-6">
    
      <div class = "form group" id = "fvol">
        <label>Volume</label>
        <input class="form-control" name="vol" id = "vol" 
        onblur="validateInput('vol', this.value, 'fvol')"
        oninput="validateAlphaNumer(this.name)">
      </div>
    
  </div>

  <div class="col-md-6">
    
      <div class = "form group" id = "fplaceofpub">
        <label>Place of Publication</label>
        <input class="form-control" name="placeofpub" id = "placeofpub" 
        onblur="validateInput('placeofpub', this.value, 'fplaceofpub')"
        oninput="validateAlphaNumer(this.name)">
      </div>
    
  </div>

    <div class="col-md-6">
    
      <div class = "form group" id = "fmater">
        <label>Materials Specific Details</label>
        <input class="form-control" name="mater" id = "mater" 
        onblur="validateInput('mater', this.value, 'fmater')"
        oninput="validateAlphaNumer(this.name)">
      </div>
    
  </div>

   <div class="col-md-6">
    
      <div class = "form group" id = "fnotearea">
        <label>Note Area</label>
        <input class="form-control" name="notearea" id = "notearea" 
        onblur="validateInput('notearea', this.value, 'fnotearea')"
        oninput="validateAlphaNumer(this.name)">
      </div>
    
  </div>

</div>
<br/><br/>
<div class="row">
<div class="col-md-4">
<div class = "form-group">
  <button class="btn btn-default btn-block" onclick = "save()">Add Book</button>
</div>
</div>
</div>

<script>
  // viewing of list of sub authors
  function viewAuthor(){
    $.ajax({
      url: "ajax/view/viewsubauthors.php",
      type: 'POST',
      data: {},
      success: function(data){
        $("#e").html(data);
              
      }
    });
    $('#subauthors').modal('show');
  }

  //viewing of add sub authors modals

  function addSub(){
    $('#subauthors').modal('hide');
    $('#addauthors').modal('show');
  }


  //saving sub authors to db
  function adds(){
    var fname = $('#autfname').val();
    var lname = $("#autlname").val();

    fname = fname.trim();
    lname = lname.trim();

    if (fname=="" || lname ==""){
      validateInput('autfname', fname, 'divautfname');
      validateInput('autlname', lname, 'divautlname');
      
      $('#allfields').modal('show');
    }
    else{
      $.ajax({
      
        url: "ajax/insert/addsub.php",
        type: 'POST',
        data: {type: fname, type1: lname},
        success: function(data){
          //$("#e").html(data);
          //alert(data);
          $('#addauthors').modal('hide');
          viewAuthor();
          $('#autfname').val('');
          $('#autlname').val('');
          validateClear('autfname', fname, 'divautfname');
          validateClear('autlname', lname, 'divautlname');
        }
      });
    }
  }

 function save(){
    var title = $('#title').val();
    var fname = $('#firstname').val();
    var lname = $('#lastname').val();
    var copyright = $('#copyright').val();
    var copy = $('#copies').val();
    var callno = $('#callno').val();
    var method = $('#acquisitionmethod').val();
    var desc = $('#description').val();
    var price = $('#price').val();
    var isbn = $('#isbn').val();
    var edition = $('#edition').val();
    var publisher = $('#publisher').val();
    var category = $('#category').val();
    var accno = $('#accno').val();
    var series = $('#series').val();
    var vol = $('#vol').val();
    var placeofpub = $('#placeofpub').val();
    var mater = $('#mater').val();
    var notearea = $('#notearea').val();
    if (title==""||fname==""||lname==""||copyright==""||copy==""||callno==""||method=="0"||desc==""||price==""
      ||isbn==""||edition==""||publisher==""||category=="" || accno == "" || series == "" || vol == "" ||placeofpub == "" || mater == "" ||notearea == "")
    {
      validateInput('title', title, 'ftitle');
      validateInput('lastname', lname, 'flastname');
      validateInput('firstname', fname, 'ffirstname');
      validateInput('copyright', copyright, 'fcopyright');
      validateInput('callno', callno, 'fcallno');
      validateSelect('acquisitionmethod', method, 'fmethod');
      validateInput('copies', copy, 'fcopy');
      validateInput('description', desc, 'fdesc');
      validateInput('price', price, 'fprice');
      validateInput('isbn', isbn, 'fisbn');
      validateInput('edition', price, 'fedition');
      validateInput('publisher', publisher, 'fpublisher');
      validateInput('category', category, 'category');
      validateInput('accno', accno, 'faccno');
      validateInput('series', series, 'fseries');
      validateInput('vol', vol, 'fvol');
      validateInput('placeofpub', placeofpub, 'fplaceofpub');
      validateInput('mater', mater, 'fmater');
      validateInput('notearea', notearea, 'fnotearea');
      $('#allfields').modal('show');
    }
    else{

      var num = Math.floor(Math.random() * 9000) + 1000;
      num = "nO-bc-" + num;
      $.ajax({
      
        url: "ajax/insert/addbook.php",
        type: 'POST',
        data: {type: title, type1: fname, type2: lname, type3: copyright,
          type4: copy, type5: callno, type6: method, type7: desc, type8: price,
          type9: isbn, type10: edition, type11: num, type12: publisher, type13: category, type14: accno, type15:series, type16: vol, type17: placeofpub, type18: mater, type19: notearea},
        success: function(data){
          //$("#e").html(data);
          //alert(data);
          $('#success').modal('show');
          $('#title').val("");
          $('#firstname').val("");
          $('#lastname').val("");
          $('#copyright').val("");
          $('#copies').val("");
          $('#callno').val("");
          $('#acquisitionmethod').val("0");
          $('#description').val("");
          $('#price').val("");
          $('#isbn').val("");
          $('#edition').val("");
          $('#publisher').val("");
          $('#category').val("");
          $('#accno').val("");
          $('#series').val("");
          $('#vol').val("");
          $('#placeofpub').val("");
          $('#mater').val("");
          $('#notearea').val("");
          validateClear('title', title, 'ftitle');
          validateClear('lastname', lname, 'flastname');
          validateClear('firstname', fname, 'ffirstname');
          validateClear('copyright', copyright, 'fcopyright');
          validateClear('callno', callno, 'fcallno');
          validateClear('acquisitionmethod', method, 'fmethod');
          validateClear('copies', copy, 'fcopy');
          validateClear('description', desc, 'fdesc');
          validateClear('price', price, 'fprice');
          validateClear('isbn', isbn, 'fisbn');
          validateClear('edition', price, 'fedition');
          validateClear('publisher', publisher, 'fpublisher');
          validateClear('category', publisher, 'fcategory');
          validateClear('accno', accno, 'faccno');
          validateClear('series', series, 'fseries');
          validateClear('vol', vol, 'fvol');
          validateClear('placeofpub', placeofpub, 'fplaceofpub');
          validateClear('mater', mater, 'fmater');
          validateClear('notearea', notearea, 'fnotearea');

          //barcode printing
          window.open('ajax/reports/book-barcode.php?barcodes='+data,'_blank');
        }
      });
    }

  }



  function closes(){
    
    $('#addalert').modal('hide');
    $('#auser').modal('hide');
  }


  function validateSelect(str, str1, str2){
    //alert('try');
    str1 = str1.trim();
    if (str1 == "0"){
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

  function validateClear(str, str1, str2){
    $('#'+str2).removeClass('has-error');
    $('#'+str2).removeClass('has-success');
  }

</script>

