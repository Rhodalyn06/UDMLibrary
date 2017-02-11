<?php
  include_once('ajax/validate.html');
?>
<div id="choose-category" class="form">
  <h3>Basic Book Info</h3>
  <div class="form-group">
    <label>Catalogue Type:</label>
    <select class="form-control" id="category-type-control">
      <option value="DDC">DDC</option>
      <option value="LCC">LCC</option>
    </select>
  </div>
  <div class="form-group">
    <label>Category</label>
    <div class="category-list"></div>
    <input type="hidden" id="category" name="category">
  </div>
  <div class="form-group">
    <label>Author's Last Name:</label>
    <input
      id="lastname"
      name="lastname"
      class="form-control"
      maxlength = 50
      oninput="validateLetters(this.name)"
      onblur="validateInput('lastname', this.value, 'flastname')"
    >
  </div>

  <button class="btn book-form-enable" disabled>Next</button>
</div>
<div id="add-book-form" class="hide">
<table>
  <tbody>
    <tr>
      <td scope="col" width="144">
        <span class="style6" style="font-size: 18px"><strong>Title</strong></span>
      </td>
      <td>
        <input class="form-control" name="title" id = "title" oninput="validateTitle(this.name)"
            onblur="validateInput('title', this.value, 'ftitle')" maxlength = 100>
      </td>
    </tr>
    <tr>
      <td scope="col" width="144">
        <span class="style6" style="font-size: 18px"><strong>Author's Last Name:</strong></span>
      </td>
      <td>
          <input type="text" readonly class="form-control lastname-placeholder">
      </td>
    </tr>
    <tr>
      <td scope="col" width="144">
        <span class="style6" style="font-size: 18px"><strong>Author's First Name:</strong></span>
      </td>
      <td>
          <input
            id="firstname"
            name="firstname"
            class="form-control"
            maxlength = 50
            oninput="validateLetters(this.name)"
            onblur="validateInput('firstname', this.value, 'ffirstnamename')"
          >
        </td>
    </tr>

                         <tr>
                        <td scope="col">
                         <div class = "form group">
                         <strong><span class="style6" style="visibility: hidden;" >afhal</span><br /></strong></td>
                        <td> <button class = "btn btn-info btn-block" style="width:45;font-size:20px;margin-bottom:20px;" onclick="viewAuthor()">Add Sub-authors</button></td>


    </div>

      <br>
                    </tr>


                    <tr>
                        <td scope="col">
                        <div class = "form group" id = "fcopyright">
                        <strong><span class="style6" style="font-size:18px;">Copyright: &nbsp;</span></strong></td>
                        <td><input class="form-control" style="margin-bottom:10px;" name="copyright" id = "copyright"
      onblur="validateInput('copyright', this.value, 'fcopyright')"
      oninput="validateNum(this.name)" maxlength = 4></td>
      </div>
                    </tr>
                    <tr>
                        <td scope="col">
                           <div class = "form group" id = "fcallno">
                        <strong><span class="style6" style="font-size:18px;">Call Number: &nbsp;</span></strong></td>
                        <td><input class="form-control" name="callno" id = "callno" oninput="validateAlphaNumer(this.name)"
      onblur="validateInput('callno', this.value, 'fcallno')" maxlength = 50></td></div>
                    </tr>
           
                          <tr>
                        <td scope="col">
                            <div class = "form group" id = "fmethod">
                        <strong><span class="style6" style="font-size:18px;">Acquisition Method: &nbsp;</span></strong></td>
                        <td><select class="form-control" style="height:50px;margin-bottom:10px;" name="acquisitionmethod" id = "acquisitionmethod"
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

    </select></td></div>
                    </tr>
                          <tr>
                        <td scope="col">
                        <div class = "form group"  id = "fcopy">
                        <strong><span class="style6" style="font-size:18px;">Copies: &nbsp;</span></strong></td>
                        <td><input class="form-control" style="margin-bottom:10px;" name="copies" id = "copies"
      onblur="validateInput('copies', this.value, 'fcopy')"
      oninput="validateNum(this.name)" maxlength = "4"></td></div>
                    </tr>
                          <tr>
                        <td scope="col">
                           <div class = "form group"  id = "fedition">
                        <strong><span class="style6" style="font-size:18px;">Edition: &nbsp;</span></strong></td>
                        <td> <input class="form-control" style="margin-bottom:10px;" name="edition" id = "edition"
        onblur="validateInput('edition', this.value, 'fedition')"
        oninput="validateAlphaNumer(this.name)" maxlength = "100"></td></div>
                    </tr>
                          <tr>
                        <td scope="col">
                           <div class = "form group" id = "fprice">
                        <strong><span class="style6" style="font-size:18px;">Price: &nbsp;</span></strong></td>
                        <td><input class="form-control" style="margin-bottom:10px;" name="price" id = "price"
      onblur="validateInput('price', this.value, 'fprice')"
      oninput="validateNumbers(this.name)" onblur="zero(this.name)" maxlength = 10></td></div>
                    </tr>
                          <tr>
                        <td scope="col">
                          <div class = "form group" id = "fdesc">
                        <strong><span class="style6" style="font-size:18px;">Description: &nbsp;</span></strong></td>
                        <td> <input class="form-control" style="margin-bottom:10px;" name="description" id = "description"
      onblur="validateInput('description', this.value, 'fdesc')"
      oninput="validateAlphaNumer(this.name)" maxlength = 100></td></div>
                    </tr>
                          <tr>
                        <td scope="col">
                           <div class = "form group" id = "fisbn">
                        <strong><span class="style6" style="font-size:18px;">ISBN: &nbsp;</span></strong></td>
                        <td><input class="form-control" style="margin-bottom:10px;" name="isbn" id = "isbn"
      onblur="validateInput('isbn', this.value, 'fisbn')"
    maxlength = "50"></td></div>
                    </tr>
                          <tr>
                        <td scope="col">
                           <div class = "form group" id = "fpublisher">
                        <strong><span class="style6" style="font-size:18px;">Publisher: &nbsp;</span></strong></td>
                        <td><input class="form-control" style="margin-bottom:10px;" name="publisher" id = "publisher"
        onblur="validateInput('publisher', this.value, 'fpublisher')"
        oninput="validateAlphaNumer(this.name)" maxlength = "100"></td></div>
                    </tr>
                          <tr>
                        <td scope="col">
                           <div class = "form group"  id = "fcategory">
                        <strong><span class="style6" style="font-size:18px;">Category: &nbsp;</span></strong></td>
                        <td><input class="form-control category-placeholder" type="text" readonly></span></td></div>
                    </tr>
                          <tr>
                        <td scope="col">
                            <div class = "form group" id = "fseries">
                        <strong><span class="style6" style="font-size:18px;">Series: &nbsp;</span></strong></td>
                        <td> <input class="form-control" style="margin-bottom:10px;" name="series" id = "series"
        onblur="validateInput('series', this.value, 'fseries')"
        oninput="validateAlphaNumer(this.name)" maxlength = 10></td></div>
                    </tr>
                          <tr>
                        <td scope="col">
                               <div class = "form group"  id = "fvol">
                        <strong><span class="style6" style="font-size:18px;">Volume: &nbsp;</span></strong></td>
                        <td><input class="form-control" style="margin-bottom:10px;" name="vol" id = "vol"
        onblur="validateInput('vol', this.value, 'fvol')"
        oninput="validateAlphaNumer(this.name)" maxlength = 50></td></div>
                    </tr>
                          <tr>
                        <td scope="col">
                        <div class = "form group" id = "fplaceofpub">
                        <strong><span class="style6" style="font-size:18px;">Place of Publication: &nbsp;</span></strong></td>
                        <td><input class="form-control" style="margin-bottom:10px;" name="placeofpub" id = "placeofpub"
        onblur="validateInput('placeofpub', this.value, 'fplaceofpub')"
        oninput="validateAlphaNumer(this.name)" maxlength = 100></td></div>
                    </tr>
                      <tr>
                        <td scope="col">
                           <div class = "form group"  id = "fmater">
                        <strong><span class="style6" style="font-size:18px;">Materials Specific Details: &nbsp;</span></strong></td>
                        <td> <input class="form-control" style="margin-bottom:10px;" name="mater" id = "mater"
        onblur="validateInput('mater', this.value, 'fmater')"
        oninput="validateAlphaNumer(this.name)" maxlength = 100></td></div>
                    </tr>

  <tr>
                        <td scope="col">
                           <div class = "form group"  id = "fnotearea">
                        <strong><span class="style6" style="font-size:18px;">Note Area: &nbsp;</span></strong></td>
                        <td> <input class="form-control" style="margin-bottom:10px;" name="notearea" id = "notearea"
        onblur="validateInput('notearea', this.value, 'fnotearea')"
        oninput="validateAlphaNumer(this.name)" maxlength = 100></td></div>
                    </tr>


                       <tr>
                        <td scope="col">
                        <div class = "form group" id = "floc">
                        <strong><span class="style6" style="font-size:18px;">Location: &nbsp;</span><br /></strong></td>
                        <td><input class="form-control"  name="location" id = "location" oninput="validateLetters(this.name)"
    onblur="validateInput('location', this.value, 'flocation')" maxlength = 50></td>
                </div>
                    </tr>
                    </tr>
                    &nbsp;&nbsp;

                </tbody>

            </table>


<br/><br/>

<div class="row">
  <div class="col-md-3">
       <button class="btn btn-default btn-block" style="width:55%;font-size:20px;" onclick = "save()">Add Book</button>
  </div>


    <div class="col-md-3">
        <button class="btn btn-default btn-block" type="button" style="width:55%;font-size:20px;" onclick="ClearFields();">Cancel</button>

    </div>
</div>
</div>
<script>
  function init() {
    loadCategory($('#category-type-control').val());
    $('#category-type-control').change(function() {
      loadCategory($(this).val());
    });

    $('.category-list').change('.category-control', function($e) {
      $category = $($e.target);
      $option = $category.find('option:selected');
      if ($category.val()) {
        $('#category').val($option.text());
        $('.category-placeholder').val($option.text());
      }
      $category.nextAll().remove();
      loadCategory($category.attr('data-type'), $category.val());
    });

    $('.book-form-enable').click(function() {
      $('#add-book-form').removeClass('hide');
    });

    $('#lastname').change(function() {
      $('.lastname-placeholder').val($(this).val());
      updateCallNumber()
    });
  }

  function loadCategory(type, parent_id) {
    type = type || 'DDC';
    $.ajax({
      url: "ajax/category/get.php",
      data: {
        'type': type,
        'parent_id': parent_id || 0,
      },
      success: function(response) {
        if (response['data'].length) {
          $select = $('<select>');
          $select.addClass('form-control');
          $select.addClass('category-control');
          $select.attr('data-type', type);
          $select.append($('<option>Choose one</option>'));

          for (var i = 0; i < response['data'].length; i++) {
            var category = response['data'][i];
            $option = $('<option></option>');
            $option.attr('value', category.id).text(category.category);
            $option.attr('data-call-number', category.call_number);
            $option.appendTo($select);
          }

          $select.appendTo($('.category-list'));
        }
        updateCallNumber();
      }
    })
  }

  function updateCallNumber() {
    $lastname = $('#lastname').val();
    $category = $('.category-list .category-control:last');
    if (!$lastname || !$category.val()) {
      $('.book-form-enable').attr('disabled', true);
      return;
    } else {
      $lastname = $lastname.toLowerCase().split('');
      $('.book-form-enable').attr('disabled', false);
      var callNumber = $category.find('option:selected').attr('data-call-number') || '';
      var cutterNumber = '';
      var c = $lastname.shift();
      var code = c.charCodeAt(0);

      if (c == 's') {
        cutterNumber = 'S';

        c = $lastname.shift();
        code = c.charCodeAt(0);

        if (c == 'a') {
          cutterNumber += '2';
        } else if (c == 'c' && $lastname[0] == 'h') {
          cutterNumber += '3';
        } else if (c == 'e') {
          cutterNumber += '4';
        } else if (code >= 'h'.charCodeAt(0) && code <= 'i'.charCodeAt(0)) {
          cutterNumber += '5';
        } else if (code >= 'm'.charCodeAt(0) && code <= 'p'.charCodeAt(0)) {
          cutterNumber += '6';
        } else if (c == 't') {
          cutterNumber += '7';
        } else if (c == 'u') {
          cutterNumber += '8';
        } else if (code >= 'w'.charCodeAt(0) && code <= 'z'.charCodeAt(0)) {
          cutterNumber += '9';
        }
      } else if (c == 'q') {
        cutterNumber = 'Q';

        c = $lastname.shift();
        code = c.charCodeAt(0);

        if (c == 'u') {
          c = $lastname.shift();
          code = c.charCodeAt(0);

          if (c == 'a') {
            cutterNumber += '3';
          } else if (c == 'e') {
            cutterNumber += '4';
          } else if (c == 'i') {
            cutterNumber += '5';
          } else if (c == 'o') {
            cutterNumber += '6';
          } else if (c == 'r') {
            cutterNumber += '7';
          } else if (c == 't') {
            cutterNumber += '8';
          } else if (c == 'y') {
            cutterNumber += '9';
          }
        } else if (code >= 'a'.charCodeAt(0) && code <= 't'.charCodeAt(0)) {
          cutterNumber += '2'
        }
      } else if (['a', 'e', 'i', 'o', 'u'].indexOf(c) !== -1) {
        cutterNumber = c.toUpperCase();

        c = $lastname.shift();
        code = c.charCodeAt(0);

        if (c == 'b') {
          cutterNumber += '2';
        } else if (c == 'd') {
          cutterNumber += '3';
        } else if (c == 'l' || c == 'm') {
          cutterNumber += '4';
        } else if (c == 'n') {
          cutterNumber += '5';
        } else if (c == 'p') {
          cutterNumber += '6';
        } else if (c == 'r') {
          cutterNumber += '7';
        } else if (c == 's' || c == 't') {
          cutterNumber += '8';
        } else if (code >= 'u'.charCodeAt(0) && code <= 'y'.charCodeAt(0)) {
          cutterNumber += '9';
        }
      } else if (code >= '0'.charCodeAt(0) && code <= '9'.charCodeAt(0)) {
        cutterNumber = 'A1' + c;
      } else {
        cutterNumber = c.toUpperCase();

        c = $lastname.shift();
        code = c.charCodeAt(0);

        if (c == 'a') {
          cutterNumber += '3';
        } else if (c == 'e') {
          cutterNumber += '4';
        } else if (c == 'i') {
          cutterNumber += '5';
        } else if (c == 'o') {
          cutterNumber += '6';
        } else if (c == 'r') {
          cutterNumber += '7';
        } else if (c == 'u') {
          cutterNumber += '8';
        } else if (c == 'y') {
          cutterNumber += '9';
        }
      }

      code = c.charCodeAt(0);
      if (code >= 'a'.charCodeAt(0) && code <= 'd'.charCodeAt(0)) {
        cutterNumber += '3';
      } else if (code >= 'e'.charCodeAt(0) && code <= 'h'.charCodeAt(0)) {
        cutterNumber += '4';
      } else if (code >= 'i'.charCodeAt(0) && code <= 'l'.charCodeAt(0)) {
        cutterNumber += '5';
      } else if (code >= 'm'.charCodeAt(0) && code <= 'o'.charCodeAt(0)) {
        cutterNumber += '6';
      } else if (code >= 'p'.charCodeAt(0) && code <= 's'.charCodeAt(0)) {
        cutterNumber += '7';
      } else if (code >= 't'.charCodeAt(0) && code <= 'v'.charCodeAt(0)) {
        cutterNumber += '8';
      } else if (code >= 'w'.charCodeAt(0) && code <= 'z'.charCodeAt(0)) {
        cutterNumber += '9';
      }

      $('#callno').val(callNumber + ' .' + cutterNumber);
    }
  }
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
    var series = $('#series').val();
    var vol = $('#vol').val();
    var placeofpub = $('#placeofpub').val();
    var mater = $('#mater').val();
    var notearea = $('#notearea').val();
    var location = $('#location').val();
    if (title==""||fname==""||lname==""||copyright==""||copy==""||callno==""||method=="0"||desc==""||price==""
      ||isbn==""||edition==""||publisher==""||category=="" || series == "" || vol == "" ||placeofpub == "" || mater == "" ||notearea == "" || location == "")
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
      validateInput('series', series, 'fseries');
      validateInput('vol', vol, 'fvol');
      validateInput('placeofpub', placeofpub, 'fplaceofpub');
      validateInput('mater', mater, 'fmater');
      validateInput('notearea', notearea, 'fnotearea');
      validateInput('location', location, 'flocation');
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
          type9: isbn, type10: edition, type11: num, type12: publisher, type13: category, type14:series, type15: vol, type16: placeofpub, type17: mater, type18: notearea, type19: location},
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
 
          $('#series').val("");
          $('#vol').val("");
          $('#placeofpub').val("");
          $('#mater').val("");
          $('#notearea').val("");
          $('#location').val("");
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
          
          validateClear('series', series, 'fseries');
          validateClear('vol', vol, 'fvol');
          validateClear('placeofpub', placeofpub, 'fplaceofpub');
          validateClear('mater', mater, 'fmater');
          validateClear('notearea', notearea, 'fnotearea');
          validateClear('location', location, 'flocation');

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


 function ClearFields() {

     document.getElementById("title").value = "";
     document.getElementById("lastname").value = "";
     document.getElementById("firstname").value = "";
     document.getElementById("copyright").value = "";
     document.getElementById("callno").value = "";
     document.getElementById("copies").value = "";
     document.getElementById("description").value = "";
     document.getElementById("price").value = "";
     document.getElementById("isbn").value = "";
     document.getElementById("edition").value = "";
     document.getElementById("publisher").value = "";
     
     document.getElementById("series").value = "";
     document.getElementById("vol").value = "";
     document.getElementById("placeofpub").value = "";
     document.getElementById("mater").value = "";
     document.getElementById("notearea").value = "";
     document.getElementById("location").value = "";


}
</script>

