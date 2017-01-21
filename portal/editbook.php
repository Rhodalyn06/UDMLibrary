<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php
    include_once('ajax/session.php');
    include_once('ajax/logout.php');

    include 'includes/style.php';
    include 'ajax/validate.html';


  ?>
</head>
<body onload="setLink('Search and Edit Book')">
    <div id="wrapper">
        <?php
          include_once('includes/header.php')
        ?>  
           <!-- /. NAV TOP  -->
        <?php
            include_once('includes/nav.php')
        ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php
                  include_once('includes/name.php')
                ?>
                 <!-- /. ROW  -->
                 <hr />

                <?php
                    
                     //book viewing
                    include_once('modals/viewbook.php');

                    //editing book
                    include_once('modals/editbook.php');

                    //for viewing all list of books
                    include_once('modals/viewallbooks.php');

                    //editing subauthors
                    include_once('modals/viewsubauthors.php');
                    include_once('modals/editsubauthor.php');
                    
                    
                    //alerts
                    include_once('modals/contact.php');
                    include_once('modals/allfields.php');
                    include_once('modals/success.php');
                    include_once('modals/delete.php');
                    include_once('modals/update.php');
                    include_once('modals/ddelete.php');
                    include_once('modals/supdate.php');
                ?>
                
    
                <div class="row">
                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel">
                        <div class="panel-heading" style="font-family:'MYRIAD PRO REGULAR';">
                           Search & Edit Books
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tblBooks">
                                    <thead>
                                      <tr>
                                        <td><strong>
                                          TITLE</strong>
                                        </td>
                                        <td><strong>
                                          AUTHOR
                                        </td></strong>
                                        <td><strong>
                                          EDITION
                                        </td></strong>
                                        <td><strong>
                                          STATUS
                                        </td></strong>
                                      </tr>
                                    </thead>
                                    <tbody id = "f">
                                    </tbody>
                                    <!--<div id = "f">
                                    </div>-->
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <?php
      include_once('includes/scripts.php');
    ?>
    <script type="text/javascript">

      var id = "";
      var gg="";
      viewDetails();
      //for table viewing
      function viewDetails(){
        $.ajax({

            url: "ajax/view/editbook.php",
            type: 'POST',
            data: {},
            success: function(data){
              
              $("#f").html(data);
              $('#tblBooks').dataTable();
              //alert(data);
            }
          });

        
      }
      //for modal viewing
      function viewbook(str){
        id = "";
        gg = "";
        id = str;
        gg=str;
        $.ajax({

            url: "ajax/view/editbook1.php",
            type: 'POST',
            data: {type: str},
            success: function(data){
              $("#g").html(data);

              $('#view').modal('show');
              //alert(data);
            }
          });
      }

      //for editting
      function edit(){
        $('#view').modal('hide');
        $.ajax({

            url: "ajax/view/editbook3.php",
            type: 'POST',
            data: {type: id},
            success: function(data){
              $("#h").html(data);
              $('#editview').modal('show');
              //alert(data);
            }
          });
      }

      //for closing
      function closes(){
        
        $('#editview').modal('hide');
        $('#viewsub').modal('hide');
        viewbook(id);
      }

      //
      function check(str, str1){
        str = str.trim();
        if (str == ""){
          $(str1).addClass('has-error');
          $(str1).removeClass('has-success');
        }
        else{

          $(str1).addClass('has-success');
          $(str1).removeClass('has-error');
        }

        if (str1 == "#contactnum"){
          contactNum('lcontactnum');
        }
      }

      function save(){
        var callno = $('#1a').val();
        var title = $('#2a').val();
        var lname = $('#3a').val();
        var fname = $('#4a').val(); 
        var edition = $('#5a').val();
        var copyright = $('#6a').val();
        var isbn = $('#7a').val();
        var method = $('#8a').val();
        var price = $('#9a').val();
        var bkcateg = $('#10a').val();
        var acid = $('#11a').val();

        if(callno==""||title==""||edition==""||lname==""||fname==""||copyright==""||
          isbn==""||method==""||price=="" || bkcateg==""){
          check(callno, '#1f');
          check(title, '#2f');
          check(lname, '#3f');
          check(fname, '#4f');
          check(edition, '#5f');
          check(copyright, '#6f');
          check(isbn, '#7f');
          check(method, '#8f');
          check(price, '#9f');
          check(bkcateg, '#10f')
          $('#allfields').modal('show');
        }
        else{
          $('#qupdate').modal('show');
          $('#editview').modal('hide');
        }

      }

      function yes(){
        var callno = $('#1a').val();
        var title = $('#2a').val();
        var lname = $('#3a').val();
        var fname = $('#4a').val(); 
        var edition = $('#5a').val();
        var copyright = $('#6a').val();
        var isbn = $('#7a').val();
        var method = $('#8a').val();
        var price = $('#9a').val();
        var bkcateg = $('#10a').val();
        var acid = $('#11a').val();
        if(callno==""||title==""||edition==""||lname==""||fname==""||copyright==""||
          isbn==""||method==""||price=="" || bkcateg==""){
          check(callno, '#1f');
          check(title, '#2f');
          check(lname, '#3f');
          check(fname, '#4f');
          check(edition, '#5f');
          check(copyright, '#6f');
          check(isbn, '#7f');
          check(method, '#8f');
          check(price, '#9f');
          check(bkcateg, '#10f');
        }
        else{
          $.ajax({

            url: "ajax/update/editbook.php",
            type: 'POST',
            data: {type: acid, type1: callno, type2: title, type3:lname,
              type4: fname, type5: edition, type6: copyright, type7: isbn,
              type8: method, type9: price, type10: bkcateg},
            success: function(data){
              //$("#d").html(data);
              $('#qupdate').modal('hide');
              $('#supdate').modal('show');
              //alert(data);
              viewDetails();
            }
          });
        }
      }

      function editSub(){
        $.ajax({

            url: "ajax/view/editviewsub.php",
            type: 'POST',
            data: {type: id},
            success: function(data){
              $("#i").html(data);
              $('#view').modal('hide');
              $('#viewsub').modal('show');
              //alert(data);
              //viewDetails();
            }
          });
      }

      function editSub1(str){
        $.ajax({

            url: "ajax/view/editviewsub.php",
            type: 'POST',
            data: {type: str},
            success: function(data){
              $("#i").html(data);
              $('#viewsub').modal('hide');
              $('#editsub1').modal('show');
              //alert(data);
              //viewDetails();
            }
          });
      }

      function no(){
        //alert('try');
        $('#edit').modal('show');
        $('#qupdate').modal('hide');
      }

      function del(){
        $('#view').modal('hide');
        $('#qdelete').modal('show');
      }

      function dYes(){

        //Clear Datas
        var datas = '';
        
        //PARENT ID
        var parentId = '';
        var ctr = 1;
        
        $(':checkbox:checked').each(function(){

            if(ctr == 45){

                //GET THE VALUES
                datas += $(this).attr('aria-barcode');
                $.ajax({

                  url: "ajax/delete/viewallbooks.php",
                  type: 'POST',
                  data: {type: datas},
                  success: function(data){
                    //$("#y").html(data);
                    //$('#x').dataTable();
                    $('#qdelete').modal('hide');
                    $('#sdelete').modal('show');
                    

                    //alert(data);
                    //viewDetails();
                  
                  }
                });

                //Clear Values
                ctr = 1;
                datas = '';

            }else{
                //GET THE VALUES
                datas += $(this).attr('aria-barcode') + ',';
                ctr++;
            }

            

        });

        if(datas != null){
            datas += $(this).attr('aria-barcode');
                $.ajax({

                  url: "ajax/delete/viewallbooks.php",
                  type: 'POST',
                  data: {type: datas},
                  success: function(data){
                    viewAllBook();
                    $("#y").html(data);
                    $('#x').dataTable();
                    $('#qdelete').modal('hide');
                    $('#sdelete').modal('show');
                  

                    //alert(data);
                    //viewDetails();

                  }
                });
        //$('#pasteme').append(datas);
        }


        
      }
      function dNo(){
        

        $('#viewallbooks').modal('show');
        $('#qdelete').modal('hide');
      }

      function viewAllBook(){
        $('#y').html("");
        $.ajax({

            url: "ajax/view/viewallbooks.php",
            type: 'POST',
            data: {type: gg},
            success: function(data){
              $("#y").html(data);
              $('#x').dataTable();
              $('#view').modal('hide');
              $('#viewallbooks').modal('show');

              //alert(data);
              //viewDetails();
            }
          });
      }

      function closeViewAllBook(){
        $('#view').modal('show');
        $('#viewallbooks').modal('hide');

        
      }

      $(document.body).on('click', '#btnSelAll', function(){
        
        if($(this).html() == 'Select All'){

            $('.postCheckBox').each(function(){
                $(this).prop('checked', true);
            });

            $('#btnGenBarcode').prop('disabled', false);
            $('#btnDel').prop('disabled', false);

            $(this).html('Deselect All');
        }else{
            
            $('.postCheckBox').each(function(){
                $(this).prop('checked', false);
            });

            $('#btnGenBarcode').prop('disabled', true);
            $('#btnDel').prop('disabled', true);

            $(this).html('Select All');
        }

    });

      $(document.body).on('click', '.postCheckBox', function(){

            var flag = false;

            $(':checkbox:checked').each(function(){
                flag = true;
            });

            if(flag){
                $('#btnDel').prop("disabled", false);
                $('#btnGenBarcode').prop("disabled", false);
            }else{
                $('#btnDel').prop("disabled", true);
                $('#btnGenBarcode').prop("disabled", true);
            }   

        });

      $(document.body).on('click', '#btnGenBarcode', function(){

        //Clear Datas
        var datas = '';
        
        //PARENT ID
        var parentId = '';
        var ctr = 1;
        
        $(':checkbox:checked').each(function(){

            if(ctr == 45){

                //GET THE VALUES
                datas += $(this).attr('aria-barcode');
                window.open('ajax/reports/book-barcode.php?barcodes='+datas,'_blank');

                //Clear Values
                ctr = 1;
                datas = '';

            }else{
                //GET THE VALUES
                datas += $(this).attr('aria-barcode') + ',';
                ctr++;
            }

            

        });

        if(datas != null){
            window.open('ajax/reports/book-barcode.php?barcodes='+datas,'_blank');
        //$('#pasteme').append(datas);
        }
        
    });



      $(document.body).on('click', '#btnDel', function(){
        $('#qdelete').modal('show');
        $('#viewallbooks').modal('hide');
        
    });

      
      
    </script>

</body>
</html>
