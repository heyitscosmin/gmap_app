<html>
	<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link href="dashboard.css" rel="stylesheet">
	<title>Adding items into SQL</title>
	</head>
	<body>
	
	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="add.php">Dashboard2</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <span data-feather="home"></span>
                  Dashboard 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="map.php">
                  Map
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">
                  Logout
                </a>
							</li>
							<?php
							session_start();
							//if(isset($_SESSION['add_message'])) { echo "<p style='color:red'>".$_SESSION['add_message']."</p></br>"; unset($_SESSION['add_message']); }
							if($_SESSION['level'] == 2) //Admin
							{
							echo "<li class='nav-item'>";
                            echo "<a class='nav-link active' href='add.php'>";
                            echo "Adaugare";
                            echo "</a>";
							echo "</li>";
							}
							?>
            </ul>
        </nav>
              <?php
              if(isset($_SESSION['add_message'])) { echo "<p style='color:red'>".$_SESSION['add_message']."</p></br>"; unset($_SESSION['add_message']); }
              ?>              
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="container">
        
        <div class="card text-center">
        <div class="card-header">
            Adaugare de iteme in lista
        </div>
        <div class="card-body">
            <h5 class="card-title">Aici se pot adauga iteme in lista</h5>
            <p class="card-text">
            <form action="map_add.php" method="get">
        <div class="form-group">
        <input class="form-control" type="text" placeholder="Latitudine"  name="f1" /><br>
        <input class="form-control" type="text" placeholder="Longitudine"  name="f2" /><br>
        <input class="form-control" type="text" placeholder="Nume"  name="f3" /><br>
        <input class="form-control" type="text" placeholder="Culoare"  name="f4" /><br>
        <input class="form-control" type="text" placeholder="Dimensiune" name="f5" /><br>
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
            </p>
        </div>
        </div>
        

        
        
        </div>           
					<br>

          <h2>Lista din SQL</h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
								<th>Latitiudine</th>
								<th>Longitudine</th>
								<th>Nume</th>
								<th>Culoare</th>
								<th>Dimensiune</th>
                </tr>
              </thead>
              <tbody>
                
								<?php
                                 if(!isset($_SESSION['login'])) Header("Location: login.php");
                                 $con = new mysqli("localhost","root","","db");
                                if (!$con) echo "Nu s-a putut conecta la baza de date!";

								$sql_cmd = "SELECT * FROM date";
								$res = $con->query($sql_cmd);

								for($i=0;$i<$res->num_rows;$i++){
								$row = $res->fetch_assoc(); //Retruneaza linie cu linie
								echo "<tr>";
								echo "<td>".$row['latitudine']."</td>";
								echo "<td>".$row['longitudine']."</td>";
								echo "<td>".$row['name']."</td>";
								echo "<td>".$row['culoare']."</td>";
								echo "<td>".$row['dimensiune']."</td>";
								echo "</tr>";
								}
								?>
                
					</tbody>
					</table>
				</div>
				</main>
			</div>
			</div>
	</body>
</html>