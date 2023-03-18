<?php require("includes/header.php"); ?>

<?php require("connection.php"); ?>
<?php 

if(empty($_SESSION["username"])){
    header("location: register.php");
};

$select = $conn->query("SELECT * FROM user");
$select->execute();

$datas = $select->fetchAll(PDO::FETCH_ASSOC);




?>

<div class="container mt-2">

    <div class="row">
      <div  class=" col-sm-12 col-lg-10 offset-1">
        <div  class="card ">
          <div class="card-body">
            <button width="50%" id="list" class="btn btn-success"><?php echo "Listed : " . $select->rowCount(); ?></button>
            <table  style="display:none;" id="showData" class="table table-hover table-dark text-white">
         <div class="card-title">
            <thead>
              <tr>
              <th scope="col">ID</th>
              <th scope="col">USERNAME</th>
             <th scope="col">EMAIL</th>
            <th scope="col">CREATED_AT</th>
            <th scope="col">Actions </th>
             </tr>
          </thead>
          </div>
        <tbody>
          <?php foreach($datas as $data) : ?>
          <tr>
            <th scope="row"><?= $data["id"] ?></th>
            <td><?= $data["username"] ?></td>
            <td><?= $data["email"] ?></td>
            <td><?= date("d-M-Y(D)",strtotime($data["created_at"])) ?></td>
            <td>
            <?php if($_SESSION["email"] == $data["email"]) : // to hide update and delete  on other users?>
              <a href="./update.php?id=<?php echo $data['id']; ?>" class="btn btn-warning"><i class="fa fa-arrow-circle-o-up" width="12px" aria-hidden="true"></i></a>
              <a href="./delete.php?id=<?= $data['id'] ?>" class="btn btn-danger"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
              <?php endif ; ?>
          </td>
          </tr>
          <?php endforeach ; ?>
          
        </tbody>
</table>
            </div>
          </div>
      </div>
    </div>
</div>

<script>
  $(document).ready(function (){
    $("#list").on("click", function (){
      $("#showData").slideToggle(1000);
    });
  })
</script>
<?php require("includes/footer.php"); ?>