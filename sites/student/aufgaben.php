<section id="main" class="nano">
	<div class="content">
	<div class="padding">
		<h2>Aufgaben</h2>
		<?php
		if (!isset($_SESSION)) {
			session_start();
		}
		$userid = $_SESSION['userid'];
		
		require_once $_SERVER['DOCUMENT_ROOT'].'/comps/constants.php';
		
		$mysql = mysql_connect(dbserver, dbuser, dbpass)
		or die ("Es konnte keine Verbindung zu MySQL hergestellt werden.");
		
		mysql_select_db(db1)
		or die ("Es konnte keine Verbindung zur Datenbank hergestellt werden.");
		
		mysql_query("SET NAMES 'utf8'");
		
		$query = mysql_query("SELECT * FROM aufgaben WHERE `student`='$userid'"); // ORDER BY nach Erstellungs- oder Fertigstellungsdatum sortieren (oder beides)
		
		if (mysql_num_rows($query) == 0) {
			echo 'Dir wurden noch keine Aufgaben zugeteilt.';
		}
		
		while ($row = mysql_fetch_assoc($query)) {
			echo $row['title'];
		}
		
		?>
	</div>
	</div>
</section>