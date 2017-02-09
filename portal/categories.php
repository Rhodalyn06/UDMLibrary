<?php
  include_once 'ajax/session.php';
  include_once 'ajax/logout.php';
  include_once 'ajax/connection.php';

  if (!$_GET['id'] && !$_GET['type']) {
    header('Location: ?type=DDC');
    exit;
  }

  $id = $_GET['id'] ?: 0;

  $parents = [];
  $current_category = null;
  if ($id) {
    $last_parent_id = $id;
    $q = mysqli_prepare($conn, 'SELECT * FROM tb_categoryy WHERE id = ?');
    while ($last_parent_id) {
      $q->bind_param('i', $last_parent_id);
      $q->execute();
      $result = $q->get_result();
      $parent = $result->fetch_assoc();
      if (!$current_category) {
        $current_category = $parent;
      }

      $last_parent_id = $parent['parent_id'];
      array_unshift($parents, $parent);
    }
  }

  $category_type = $_GET['type'] ?: $current_category['type'];
  $q = mysqli_prepare(
      $conn,
      'SELECT * FROM tb_categoryy WHERE type = ? AND parent_id = ?'
  );

  $q->bind_param("si", $category_type, $id);

  $categories = [];
  if (!$q->execute()) {
      echo 'Unable to fetch categories';
      exit;
  }
  $result = $q->get_result();
  $categories = $result->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include 'includes/style.php' ?>
  </head>
  <body onload="setLink('Add Book Category')">
    <div id="wrapper">
      <?php include_once('includes/header.php') ?>
      <?php include_once('includes/nav.php') ?>
      <div id="page-wrapper">
        <div id="page-inner">
          <?php include_once('includes/name.php') ?>
          <hr />

          <?php if (!$current_category): ?>
            <div>
              Type:
              <?php if ($category_type != 'DDC') : ?>
                <a href="?type=DDC">DDC</a>
              <?php else: ?>
                <b>DDC</b>
              <?php endif ?> /
              <?php if ($category_type != 'LCC') : ?>
                <a href="?type=LCC">LCC</a>
              <?php else: ?>
                <b>LCC</b>
              <?php endif ?>
            </div>
          <?php else: ?>
            <div>
              <a href="?type=<?= $category_type ?>">All <?= $current_category['type'] ?> Categories</a>
              <?php foreach ($parents as $cat): ?>
                /
                <a href="?type=<?= $cat['type'] ?>&amp;id=<?= $cat['id'] ?>">
                  <?= $cat['category'] ?>
                </a>
              <?php endforeach ?>
            </div>
            <h3 class="title">
              Details for "<?= $current_category['category'] ?>"
              <small>
                <a href="addcateg.php?id=<?= $current_category['id'] ?>">[Edit]</a>
              </small>
            </h3>
            <div class="category-detail">
              <b>ID</b>: <?= $current_category['id'] ?><br>
              <b>Name</b>: <?= $current_category['category'] ?><br>
              <b>Type</b>: <?= $current_category['type'] ?><br>
              <b>Call Number</b>: <?= $current_category['call_number'] ?><br>
            </div>
          <?php endif ?>

          <div class="pull-right">
            <a href="addcateg.php?parent_id=<?= $current_category['id'] ?>" class="btn btn-primary">
              Add New <?php if ($id): ?>Subcategory<?php endif ?></button>
            </a>
          </div>

          <h3 class="title">
            <?php if ($current_category): ?>
              Subcategories for "<?= $current_category['category'] ?>"
            <?php else: ?>
              <?= $category_type ?> Categories
            <?php endif ?>
          </h3>
          <table class="table" id="categories">
            <thead>
              <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Type</td>
                <td>Call Number</td>
              </tr>
            </thead>
            <tbody>
              <?php if ($categories): ?>
                <?php foreach($categories as $cat): ?>
                  <tr>
                    <td>
                      <a href="?type=<?= $cat['type'] ?>&amp;id=<?= $cat['id'] ?>">
                        <?= $cat['id'] ?>
                      </a>
                    </td>
                    <td><?= $cat['category'] ?></td>
                    <td><?= $cat['type'] ?></td>
                    <td><?= $cat['call_number'] ?></td>
                  </tr>
                <?php endforeach ?>
              <?php else: ?>
                <tr><td colspan="100%">No categories</td></tr>
              <?php endif ?>
            </tbody>
          </table>
          <form>
          </form>
        </div>
      </div>
    </div>
    <?php include_once('includes/scripts.php') ?>
    <script type="text/template" id="row-template">
      <tr>
        <td class="cat-id">
          <a href="#" class="cat-load"></a>
        </td>
        <td class="cat-name"></td>
        <td class="cat-type"></td>
      </tr>
    </script>
    <script type="text/javascript">
      // $(function() {
      //   getSubCategory('<?= $category_type ?>', 0, function(error, data) {
      //     renderCategories(data);
      //   });
      // });

      // $('#categories').click('.cat-load', function(event) {
      //   var $category = $(event.target).parents('tr');
      //   $('#categories tbody').html('');
      //   getSubCategory(
      //     $category.data('type'),
      //     $category.data('id'),
      //     function(error, data) {
      //       renderCategories(data);
      //     }
      //   );
      // });

      // var getSubCategory = function(type, parent_id, callback) {
      //   $.ajax({
      //     'method': 'GET',
      //     'url': '/portal/ajax/category/get.php',
      //     'data': {'type': type, 'parent_id': parent_id},
      //     'success': function(data) {
      //       callback(null, data['data']);
      //     }
      //   });
      // }

      // var renderCategories = function(categories) {
      //   if (!categories || !categories.length) {
      //     $('#categories tbody').html(
      //       '<tr><td colspan="100%">No subcategories</td></tr>'
      //     );
      //     return;
      //   }

      //   for (var i = 0; i < categories.length; i++) {
      //     var $row = $($('#row-template').html());
      //     $row.attr('data-id', categories[i].id);
      //     $row.attr('data-type', categories[i].type);

      //     $('.cat-load', $row).html(categories[i].id);
      //     $('.cat-name', $row).html(categories[i].category);
      //     $('.cat-type', $row).html(categories[i].type);
      //     $('#categories tbody').append($row);
      //   }
      // }
    </script>
  </body>
</html>
