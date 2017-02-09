<?php
  include_once 'ajax/session.php';
  include_once 'ajax/logout.php';
  include_once 'ajax/connection.php';

  $id = $_GET['id'] ?: 0;
  $parent_id = $_GET['parent_id'] ?: 0;
  $category = null;
  $parent = null;

  $q = $conn->prepare('SELECT * FROM tb_categoryy WHERE id = ?');
  if ($id) {
    $q->bind_param('i', $id);
    $q->execute();
    $result = $q->get_result();
    $category = $result->fetch_assoc();
    $parent_id = $category['parent_id'];
  }

  if ($parent_id) {
    $q->bind_param('i', $parent_id);
    $q->execute();
    $result = $q->get_result();
    $parent = $result->fetch_assoc();
  }

  $categories_by_parent = [];
  $result = $conn->query('SELECT * FROM tb_categoryy ORDER BY type');
  while ($row = $result->fetch_assoc()) {
    if (!array_key_exists($row['parent_id'], $categories_by_parent)) {
      $categories_by_parent[$row['parent_id']] = [];
    }

    $categories_by_parent[$row['parent_id']][] = $row;
  }

  if ($_POST['submit']) {
    if ($category) {
      $q = $conn->prepare('UPDATE tb_categoryy SET category = ?, call_number = ? WHERE id = ?');
      $q->bind_param('ssi', $_POST['name'], $_POST['call_number'], $category['id']);
    } else {
      $q = $conn->prepare('INSERT INTO tb_categoryy (category, call_number, type, parent_id) VALUES (?, ?, ?, ?)');
      $q->bind_param('sssi', $_POST['name'], $_POST['call_number'], $_POST['type'], $_POST['parent_id']);
    }
    if (!$q->execute()) {
      var_dump($_POST);
      echo $q->error;
      exit;
    } else if (!$category) {
      $id = $conn->insert_id;
    }

    header('Location: categories.php?id=' . $id);
    exit;
  }

  function build_category_options($categories, $categories_by_parent) {
    $output = '';
    foreach ($categories as $cat) {
      $output .= "<option value='{$cat['id']}'>{$cat['category']} ({$cat['type']})</option>";
      if (array_key_exists($cat['id'], $categories_by_parent)) {
        $output .= "<optgroup label='Subcategories for {$cat['category']}'>";
        $output .= build_category_options(
          $categories_by_parent[$cat['id']],
          $categories_by_parent
        );
        $output .= '</optgroup>';
      }
    }

    return $output;
  }
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
          <div>
            Category List:
            <a href="categories.php?type=DDC">DDC</a> /
            <a href="categories.php?type=LCC">LCC</a>
          </div>
          <form method="post">
            <div class="form-group">
              <label for="name">Name</label>
              <input
                id="name"
                name="name"
                type="text"
                class="form-control"
                placeholder="Name"
                value="<?= $category['category'] ?>"
              >
            </div>
            <div class="form-group">
              <label for="call_number">Call Number</label>
              <input
                id="call_number"
                name="call_number"
                type="text"
                class="form-control"
                placeholder="Call Number"
                value="<?= $category['call_number'] ?>"
              >
            </div>
            <div class="form-group">
              <label for="type">Type</label>
              <?php if (!$parent): ?>
                <select name="type" id="type" class="form-control">
                  <option>DDC</option>
                  <option>LCC</option>
                </select>
              <?php else: ?>
                <input
                  type="text"
                  disabled
                  readonly
                  class="form-control"
                  name="type"
                  value="<?= $parent['type'] ?>"
                >
                <input type="hidden" name="type" value="<?= $parent['type'] ?>">
              <?php endif ?>
            </div>
            <div class="form-group">
              <label for="parent">Parent:</label>
              <?php if (!$parent): ?>
                <select name="parent_id" class="form-control">
                  <option value="0">None</option>
                  <?php
                    echo build_category_options(
                      $categories_by_parent['0'],
                      $categories_by_parent
                    );
                  ?>
                </select>
              <?php else: ?>
                <input
                  type="text"
                  disabled
                  readonly
                  class="form-control"
                  value="<?= $parent['category'] ?> (<?= $parent['type'] ?>)"
                >
                <input type="hidden" name="parent_id" value="<?= $parent['id'] ?>">
              <?php endif ?>
            </div>
            <input type="hidden" name="submit" value="1">
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
    <?php include_once('includes/scripts.php') ?>
  </body>
</html>
